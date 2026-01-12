<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of all orders.
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'status', 'shippingMethod', 'items.product']);

        // Filtrowanie po statusie
        if ($request->filled('status')) {
            $query->where('order_status_id', $request->status);
        }

        // Sortowanie
        $sortBy = $request->get('sort', 'created_at');
        $sortDir = $request->get('dir', 'desc');
        
        $allowedSortFields = ['id', 'created_at', 'total_price', 'customer_name'];
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Pobierz wszystkie zamówienia
        $orders = $query->get();

        // Filtrowanie po przekroczonym czasie dostawy (w PHP, nie SQL)
        if ($request->has('overdue') && $request->overdue == '1') {
            $orders = $orders->filter(function($order) {
                // Sprawdź czy zamówienie ma metodę dostawy i dni dostawy
                if (!$order->shippingMethod || !$order->shippingMethod->delivery_days) {
                    return false;
                }
                
                // Sprawdź czy status to "W trakcie realizacji" lub "Wysłane"
                if (!in_array($order->status->name, ['W trakcie realizacji', 'Wysłane'])) {
                    return false;
                }
                
                // Oblicz przewidywaną datę dostawy
                $expectedDelivery = $order->created_at->copy()->addDays($order->shippingMethod->delivery_days);
                
                // Sprawdź czy jest opóźnione
                return now()->greaterThan($expectedDelivery);
            });
        }

        // Paginacja
        $currentPage = $request->get('page', 1);
        $perPage = 20;
        $pagedData = $orders->slice(($currentPage - 1) * $perPage, $perPage)->values();
        
        $orders = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $orders->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $statuses = OrderStatus::all();

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    /**
     * Cancel an order.
     */
    public function cancel(Order $order)
    {
        $cancelledStatus = OrderStatus::where('name', 'Anulowane')->first();
        
        if (!$cancelledStatus) {
            return redirect()->back()->with('error', 'Nie znaleziono statusu "Anulowane".');
        }

        $order->order_status_id = $cancelledStatus->id;
        $order->save();

        return redirect()->back()->with('success', "Zamówienie #{$order->id} zostało anulowane.");
    }

    /**
     * Process refund for an order.
     */
    public function refund(Order $order)
    {
        // Sprawdź czy dostawa została przekroczona
        if (!$order->shippingMethod || !$order->shippingMethod->delivery_days) {
            return redirect()->back()->with('error', 'Nie można określić czasu dostawy dla tego zamówienia.');
        }

        $expectedDeliveryDate = $order->created_at->addDays($order->shippingMethod->delivery_days);
        $now = Carbon::now();

        if ($now->lessThan($expectedDeliveryDate)) {
            return redirect()->back()->with('error', 'Czas dostawy nie został jeszcze przekroczony.');
        }

        // Zmień status na "Zwrot"
        $refundStatus = OrderStatus::where('name', 'Zwrot')->firstOrCreate(
            ['name' => 'Zwrot'],
            ['color' => 'danger']
        );

        $order->order_status_id = $refundStatus->id;
        $order->save();

        return redirect()->back()->with('success', "Zwrot pieniędzy dla zamówienia #{$order->id} został zrealizowany.");
    }
}
