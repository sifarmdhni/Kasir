<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriProdukController;




Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout']);









Route::resource('customers', CustomerController::class);
Route::resource('kategori-produks', KategoriProdukController::class);
Route::resource('product', ProdukController::class);
Route::resource('payments', PaymentController::class);
Route::resource('kasirs', KasirController::class);
Route::resource('transaksis', TransaksiController::class);
Route::get('/product-add', [ProdukController::class, 'create']);