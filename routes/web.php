<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\TransaksiController;


use App\Http\Controllers\KasirController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;





  //crud login
Route::get( '/', [AuthController::class, 'login'])->name('kasir.get');
Route::post('/login', [AuthController::class, 'authenticating'])->name('kasir.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('kasir.logout');

//crud data user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);

//crud data kategoriproduk
Route::get('/kategoriproduk', [KategoriProdukController::class, 'index']);
Route::post('/kategoriproduk/store', [KategoriProdukController::class, 'store']);
Route::post('/kategoriproduk/update/{id}', [KategoriProdukController::class, 'update']);
Route::delete('/kategoriproduk/destroy/{id}', [KategoriProdukController::class, 'destroy']);

//crud data produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy']);

//crud data customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy']);


//crud data setting diskon
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);

//crud data transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'index']);

//crud data setting profile
Route::get('/profile', [userController::class, 'profile']);
Route::post('/profile/updateprofile/{id}', [UserController::class, 'updateprofile']);

//crud data kasir
Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir/store', [KasirController::class, 'store']);
Route::post('/kasir/update/{id}', [KasirController::class, 'update']);
Route::delete('/kasir/destroy/{id}', [KasirController::class, 'destroy']);




// Route::resource('customers', CustomerController::class);
// Route::resource('kategori-produks', KategoriProdukController::class);
// Route::resource('product', ProdukController::class);
// Route::resource('payments', PaymentController::class);
// Route::resource('kasirs', KasirController::class);
// Route::resource('transaksis', TransaksiController::class);
// Route::get('/product-add', [ProdukController::class, 'create']);
// Route::get('/product-add', [ProdukController::class, 'create']);

//crud data kasir
Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir/store', [KasirController::class, 'store'])->name("kasir.store");
Route::post('/kasir/update/{id}', [KasirController::class, 'update']);
Route::delete('/kasir/destroy/{id}', [KasirController::class, 'destroy']);
Route::get('/kasir/poto/{id}', [KasirController::class, 'showPoto'])->name('kasir.poto');
Route::resource('kasir', KasirController::class);

//kasir
Route::get('/dashboard', function () {
  return  view('kasir.dashboard_kasir.dashboard');
});
Route::get('/customer', function () {
  return  view('kasir.dashboard_kasir.customer');
});
Route::get('/produk', function () {
  return  view('kasir.dashboard_kasir.produk');
});
Route::get('/kategori', function () {
  return  view('kasir.dashboard_kasir.kategoriproduk');
});
Route::get('/transaksi', function () {
  return  view('kasir.dashboard_kasir.transaksi');
});


//customer
Route::get('/cobacustomer', function () {
  return view('customer.dashboard_customer.histori_transaksi');
});
Route::get('/profile', function () {
  return view('customer.dashboard_customer.profile');
});
Route::get('/index', function () {
  return view('customer.dashboard_customer.index');
});


//admin


//kasir
