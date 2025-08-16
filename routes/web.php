<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ProductController::class,'index'])->name('home');

Route::get('/login', function () {
    return view('login.index');
});
Route::get('/register', [AuthController::class, 'viewReg'])->name('register.view');

Route::get('/products', [ProductController::class,'index'])->name('product');
Route::get('/profile', [ProfileController::class,'index'])->name('product');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout', function() {
    abort(404);
})->name('checkoutGET');
Route::post('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::get( '/checkout/{code}', [CheckoutController::class,'getData'])->name('getData');
Route::get( '/checkout/detail/{code}', [CheckoutController::class,'detailOrder'])->name('getDetailCheckout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/logout', [AuthController::class,'Logout'])->name('logout');