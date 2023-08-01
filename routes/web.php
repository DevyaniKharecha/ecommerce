<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Home Page
Route::get('/', [ProductController::class, 'index'])->name('home');

// Product Listing Page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Product Details Page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




