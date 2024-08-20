<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('customer', CustomerController::class);
Route::resource('kategori-product', KategoriProdukController::class);
Route::resource('product', ProdukController::class);
Route::resource('payment', PaymentController::class);
Route::resource('kasir', KasirController::class);
Route::resource('transaksi', TransaksiController::class);