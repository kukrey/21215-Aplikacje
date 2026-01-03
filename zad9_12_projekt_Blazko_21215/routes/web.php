<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = Product::select('products.*')
        ->join('order_items', 'order_items.product_id', '=', 'products.id')
        ->groupBy('products.id')
        ->orderByRaw('SUM(order_items.quantity) DESC')
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

