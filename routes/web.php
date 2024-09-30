<?php

use App\Http\Middleware\customer;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PaymentController;


use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthKasirController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthProdukController;
use App\Http\Controllers\AuthCustomerController;
use App\Http\Controllers\AuthTransaksiController;
use App\Http\Controllers\CustomerKasirController;
use App\Http\Controllers\LaporanProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\LaporanTransaksiController;


Route::get('/', [DashboardController::class, 'index']);
Route::get('/loginadmin', [DashboardController::class, 'index2']);
Route::get('/logincustomer', [DashboardController::class, 'index3']);
Route::get('/loginkasir', [DashboardController::class, 'index4']);

// Route::post('/kasir/store', [DashboardController::class, 'store']);


//admin
Route::middleware('auth.admin')->group(function () {
Route::get('/d_admin', function () {
   return view('admin.dashboardadmin.d_admin');
});
Route::get('/kasir/poto/{id}', [KasirController::class, 'showPoto'])->name('kasir.poto');
Route::resource('kasir', KasirController::class);
//logout
// Route::post('/logout', [AuthAdminController::class, 'logout'])->name('logout');
// Dashboard setelah login
//route register
//laporan produk admin
Route::get('/laporanproduk', [LaporanProdukController::class, 'laporanproduk']);
Route::post('/laporanproduk/store', [LaporanProdukController::class, 'store'])->name('produk.store');
Route::post('/laporanproduk/update/{id}', [LaporanProdukController::class, 'update']);
Route::post('/laporanproduk/destroy/{id}', [LaporanProdukController::class, 'destroy']);

Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

//crud data user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);

Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/update/{id}', [PaymentController::class, 'update']);
Route::post('/payment/destroy/{id}', [PaymentController::class, 'destroy']);

Route::get('/laporantransaksi', [LaporanTransaksiController::class, 'laporantransaksi']);
Route::post('/laporantransaksi/store', [LaporanTransaksiController::class, 'createTransaksi']);
Route::post('/laporantransaksi/update/{id}', [LaporanTransaksiController::class, 'update']);
Route::delete('/laporantransaksi/destroy/{id}', [LaporanTransaksiController::class, 'destroy']);
});
//register
Route::get('/register', [AuthAdminController::class, 'index2'])->name("admin.auth.index2");
Route::post('/register', [AuthAdminController::class, 'register'])->name("admin.register");
//route login
Route::get('/authadmin', [AuthAdminController::class, 'index'])->name("admin.auth.index");
Route::post('/authadmin', [AuthAdminController::class, 'login'])->name("admin.login");



//kasir
Route::middleware('auth.kasir')->group(function () {

  Route::get('/indexkasir', [TransaksiController::class, 'dashboard'])->name('dashboard.index');
  
// Route::get('/transaksi', function () {
//   return  view('kasir.dashboard_kasir.transaksi');
// });
Route::get('/transaksi', [TransaksiController::class, 'CreateTransaksi'])->name('transaksi.create');
Route::get('/transaksi/{id}', [TransaksiController::class, 'getCustomerDiscount']);
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

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
Route::get('/customerkasir', [CustomerKasirController::class, 'index']);
Route::post('/customerkasir/store', [CustomerKasirController::class, 'store']);
Route::post('/customerkasir/update/{id}', [CustomerKasirController::class, 'update']);
Route::delete('/customerkasir/destroy/{id}', [CustomerKasirController::class, 'destroy']);
//logout
Route::post('/kasir/logout', [AuthKasirController::class, 'logout'])->name('kasir.logout');
});

Route::get('/authkasir', [AuthKasirController::class, 'index'])->name('kasir.auth.index');
Route::post('/loginkasir', [AuthKasirController::class, 'login'])->name('kasir.login');


//customer
Route::middleware('auth.customer')->group(function () {
  Route::get('/profilecustomer', [CustomerController::class, 'indexProfileCustomer'])->name('customer.profile.edit');
  Route::post('/updateprofile', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
  
  
  Route::get('/historicustomer', [CustomerController::class, 'hitoriTransaksiCustomer']);
  Route::post('/customer', [CustomerController::class, 'store']);
  Route::get('/indexcustomer', [CustomerController::class, 'index'])->name("customer.index");
  Route::post('/customer/store', [CustomerController::class, 'store']);
  Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
  Route::post('/customer/logout', [AuthCustomerController::class, 'logout'])->name('customer.logout');

});

//login custumer
Route::get('/authcustomer', [AuthCustomerController::class, 'index'])->name("customer.auth.index");
Route::post('/login', [AuthCustomerController::class, 'login'])->name("customer.login");


Route::get('/cetak-transaksi/{id}', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.transaksi');
