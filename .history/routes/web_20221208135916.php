<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/top', [App\Http\Controllers\CategoryController::class, 'top'])->name('category.top');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::put('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/products/{category}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'profile'])->name('product.profile');
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('/user/cart', [App\Http\Controllers\CartController::class, 'index'])->name('user.cart');
Route::get('/user/cart/{product}/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('user.cart.remove');
Route::get('/user/order/create', [App\Http\Controllers\OrderController::class, 'store'])->name('order.create');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



// Route::get('/user/fetch/cart', [App\Http\Controllers\CartController::class, 'fetch_cart_items'])->name('user.fetch.cart');
// Route::get('/user/fetch/cart/quantity', [App\Http\Controllers\CartController::class, 'fetch_cart_quantity'])->name('user.fetch.cart.quantity');
