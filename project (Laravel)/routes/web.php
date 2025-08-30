<?php

use App\Http\Controllers\VoucherController;
use App\Models\userVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\DashboardProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login.index');
})->middleware('guest');

Route::get('/register', [AuthController::class, 'viewReg'])->name('register.view')->middleware('guest');

Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/profile', [ProfileController::class, 'index'])->name('product')->middleware('auth');
Route::get('/search-order', [ProductController::class, 'search'])->name('searchOrder');

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
    Route::resource('vouchers', VoucherController::class)->only('destroy', 'update', 'store');
    Route::post('/voucher/user', function (Request $request) {
        // dd($request);
        // cek apakah current user adalah seller
        $validated = $request->validate([
            'code' => 'required|unique:vouchers,code',
            'user_id' => 'required|exists:users,id',
            'percentage' => 'required|numeric'
        ]);

        $voucher = Voucher::create([
            'code' => $validated['code'],
            'percentage' => $validated['percentage'],
            'max_uses' => 1,
            'is_public' => false
        ]);

        userVoucher::create([
            'user_id' => $validated['user_id'],
            'voucher_id' => $voucher->id
        ]);

        return back()->with('success','Berhasil Menambahkan Voucher ');
    });
});

Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout')->middleware('auth');
