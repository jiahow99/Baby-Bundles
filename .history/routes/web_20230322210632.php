<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    
    // Product
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::put('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

    // Cart
    Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/user/cart', [App\Http\Controllers\CartController::class, 'index'])->name('user.cart');
    Route::get('/user/cart/{product}/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('user.cart.remove');
    Route::get('/user/cart/{product}/remove/sidecart', [App\Http\Controllers\CartController::class, 'remove_sidecart'])->name('user.cart.remove.sidecart');

    // User

    // Order
    Route::get('/user/order/create', [App\Http\Controllers\OrderController::class, 'store'])->name('order.create');

    Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category
Route::get('/products/{category}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

// Product
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'profile'])->name('product.profile');
Route::get('/user/shop', [App\Http\Controllers\ProductController::class, 'index'])->name('user.shop');

// User
Route::get('/user/order/index', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('/user/order/details/{order}', [App\Http\Controllers\OrderController::class, 'view'])->name('order.view')->middleware('can:view,order');

// Sidebar cart
Route::get('/user/fetch/sidebarcart', [App\Http\Controllers\CartController::class, 'fetch_sidebar_cart'])->name('product.sidebarcart');








// Route::get('/user/fetch/cart', [App\Http\Controllers\CartController::class, 'fetch_cart_items'])->name('user.fetch.cart');
// Route::get('/user/fetch/cart/quantity', [App\Http\Controllers\CartController::class, 'fetch_cart_quantity'])->name('user.fetch.cart.quantity');
