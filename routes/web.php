<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserVoucherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/counter', function() {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.index');
})->middleware('guest');

Route::get('/register', [AuthController::class, 'viewReg'])->name('register.view')->middleware('guest');

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/profile', [ProfileController::class, 'index'])->name('product')->middleware('auth');
Route::get('/search-order', [ProductController::class,'search'])->name('searchOrder');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout', function () {
    abort(404);
})->name('checkoutGET');
Route::post('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::get('/checkout/{code}', [CheckoutController::class, 'getData'])->name('getData');
Route::get('/checkout/detail/{code}', [CheckoutController::class, 'detailOrder'])->name('getDetailCheckout');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', OrderController::class);
    Route::resource('products', DashboardProductController::class);
    Route::resource('users', UserVoucherController::class);

});

Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout')->middleware('auth');
