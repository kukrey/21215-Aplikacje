<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Check if user is admin
     */
    private function checkAdmin()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Brak dostępu do panelu administratora');
        }
    }

    /**
     * Admin dashboard
     */
    public function dashboard()
    {
        $this->checkAdmin();
        
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();

        return view('admin.dashboard', compact('totalProducts', 'totalUsers', 'totalOrders'));
    }

    /**
     * List all products for editing
     */
    public function products()
    {
        $this->checkAdmin();
        
        $products = Product::with('manufacturer', 'category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Edit product (show form)
     */
    public function editProduct(Product $product)
    {
        $this->checkAdmin();
        
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update product price
     */
    public function updatePrice(Request $request, Product $product)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $product->update([
            'price' => $validated['price'],
        ]);

        return redirect()->route('admin.products')->with('success', 'Cena produktu zaktualizowana');
    }

    /**
     * Delete product
     */
    public function deleteProduct(Product $product)
    {
        $this->checkAdmin();
        
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produkt usunięty');
    }

    /**
     * Search user by name
     */
    public function searchUser(Request $request)
    {
        $this->checkAdmin();
        
        $search = $request->input('search');
        $user = null;
        $orders = null;

        if ($search) {
            $user = User::where('name', 'like', "%{$search}%")->first();
            if ($user) {
                $orders = $user->orders()->with(['items.product', 'status', 'shippingMethod'])->latest()->get();
            }
        }

        return view('admin.users.search', compact('user', 'orders', 'search'));
    }
}
