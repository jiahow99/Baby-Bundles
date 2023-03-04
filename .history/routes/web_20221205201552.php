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
Route::get('/products/{category}', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'profile'])->name('product.profile');
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('product.profile');
