<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;

use App\Http\Controllers\KasirController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransaksiController;





Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);


Route::get('/kategoriproduk', [KategoriProdukController::class, 'index']);
Route::post('/kategoriproduk/store', [KategoriProdukController::class, 'store']);
Route::post('/kategoriproduk/update/{id}', [KategoriProdukController::class, 'update']);
Route::delete('/kategoriproduk/destroy/{id}', [KategoriProdukController::class, 'destroy']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy']);

Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/update/{id}', [PaymentController::class, 'update']);
Route::post('/payment/destroy/{id}', [PaymentController::class, 'destroy']);
Route::get('/bca', [PaymentController::class, 'bca']);


// Route::resource('customers', CustomerController::class);
// Route::resource('kategori-produks', KategoriProdukController::class);
// Route::resource('product', ProdukController::class);
// Route::resource('payments', PaymentController::class);
// Route::resource('kasirs', KasirController::class);
// Route::resource('transaksis', TransaksiController::class);
// Route::get('/product-add', [ProdukController::class, 'create']);