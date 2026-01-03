<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    private function getCart()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())->first();
        }
        
        $sessionId = session()->getId();
        return Cart::where('session_id', $sessionId)->first();
    }

    public function index()
    {
        $cart = $this->getCart();
        
        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Twój koszyk jest pusty!');
        }

        $cart->load('items.product');
        $shippingMethods = ShippingMethod::all();
        
        return view('checkout.index', compact('cart', 'shippingMethods'));
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Musisz być zalogowany, aby złożyć zamówienie.');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_method_id' => 'required|exists:shipping_methods,id',
            'payment_method' => 'required|in:card,transfer,cash_on_delivery',
        ]);

        $cart = $this->getCart();
        
        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Twój koszyk jest pusty!');
        }

        $cart->load('items.product');
        $shippingMethod = ShippingMethod::findOrFail($request->shipping_method_id);
        $pendingStatus = OrderStatus::where('name', 'pending')->first();

        DB::beginTransaction();
        try {
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_status_id' => $pendingStatus->id,
                'shipping_method_id' => $shippingMethod->id,
                'total_price' => $cart->total,
                'shipping_cost' => $shippingMethod->cost,
                'discount_amount' => 0,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'shipping_address' => $request->shipping_address,
            ]);

            // Create order items
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    // store historical price to avoid future price changes impacting old orders
                    'price_at_purchase' => $item->price,
                ]);
            }

            // Clear cart
            $cart->items()->delete();

            DB::commit();

            return redirect()->route('checkout.success', $order)->with('success', 'Zamówienie zostało złożone!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Wystąpił błąd podczas przetwarzania zamówienia.');
        }
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product', 'shippingMethod', 'orderStatus');
        
        return view('checkout.success', compact('order'));
    }

    /**
     * Show authenticated user's order history.
     */
    public function history()
    {
        $orders = Order::with(['items.product', 'status', 'shippingMethod'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('profile.orders', compact('orders'));
    }
}
