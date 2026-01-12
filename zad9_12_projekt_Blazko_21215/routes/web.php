<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_quantity'))
        ->join('order_items', 'order_items.product_id', '=', 'products.id')
        ->groupBy('products.id')
        ->orderBy('total_quantity', 'DESC')
        ->take(4)
        ->get();

    if ($products->isEmpty()) {
        $products = Product::take(4)->get();
    }

    return view('welcome', compact('products'));
});

// Order history (user profile)
Route::middleware('auth')->group(function () {
    Route::get('/profile/orders', [CheckoutController::class, 'history'])->name('orders.history');
});

// Products routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/item/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/item/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// Admin routes
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
Route::patch('/admin/products/{product}/price', [AdminController::class, 'updatePrice'])->name('admin.products.price');
Route::delete('/admin/products/{product}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
Route::get('/admin/users/search', [AdminController::class, 'searchUser'])->name('admin.users.search');

// Admin User Management routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [\App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/inactive', [\App\Http\Controllers\Admin\AdminUserController::class, 'inactive'])->name('users.inactive');
    Route::get('/users/{user}/password', [\App\Http\Controllers\Admin\AdminUserController::class, 'editPassword'])->name('users.password.edit');
    Route::put('/users/{user}/password', [\App\Http\Controllers\Admin\AdminUserController::class, 'updatePassword'])->name('users.password.update');
    Route::delete('/users/{user}', [\App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/bulk-delete', [\App\Http\Controllers\Admin\AdminUserController::class, 'bulkDelete'])->name('users.bulk-delete');
    
    // Admin Order Management routes
    Route::get('/orders', [\App\Http\Controllers\Admin\AdminOrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/cancel', [\App\Http\Controllers\Admin\AdminOrderController::class, 'cancel'])->name('orders.cancel');
    Route::post('/orders/{order}/refund', [\App\Http\Controllers\Admin\AdminOrderController::class, 'refund'])->name('orders.refund');
});

