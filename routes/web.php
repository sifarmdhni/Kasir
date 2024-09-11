<?php

use App\Http\Middleware\customer;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PaymentController;


use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthKasirController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthCustomerController;
use App\Http\Controllers\CustomerKasirController;
use App\Http\Controllers\KategoriProdukController;




//crud login
//Route::get( '/', [AuthController::class, 'login'])->name('kasir.get');
Route::post('/login', [AuthController::class, 'authenticating'])->name('kasir.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');





//crud data produk
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy']);



Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/update/{id}', [PaymentController::class, 'update']);
Route::post('/payment/destroy/{id}', [PaymentController::class, 'destroy']);
Route::get('/bca', [PaymentController::class, 'bca']);


//crud data setting diskon
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);

//crud data transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'index']);

//crud data setting profile
Route::get('/profile', [UserController::class, 'profile']);
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
Route::post('/kasir/store', [KasirController::class, 'store'])->name("user.store");
Route::post('/kasir/update/{id}', [KasirController::class, 'update']);
Route::delete('/kasir/destroy/{id}', [KasirController::class, 'destroy']);

//admin
Route::get('/d_admin', function () {
   return view('admin.dashboardadmin.d_admin');
});
Route::get('/laporanproduk', function () {
  return view('admin.dashboardadmin.laporanproduk');
});
Route::get('/laporantransaksi', function () {
  return view('admin.dashboardadmin.laporantransaksi');
});
Route::get('/kasir/poto/{id}', [KasirController::class, 'showPoto'])->name('kasir.poto');
Route::resource('kasir', KasirController::class);
Route::get('/authadmin', [AuthAdminController::class, 'index'])->name("admin.auth.index");
Route::post('/loginadmin', [AuthAdminController::class, 'login'])->name("admin.login");
//crud data user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);

//kasir
Route::get('/indexkasir', function () {
  return  view('kasir.dashboard_kasir..dashboard');
});
Route::get('/transaksi', function () {
  return  view('kasir.dashboard_kasir.transaksi');
});
Route::get('/authkasir', [AuthKasirController::class, 'index'])->name('kasir.auth.index');
Route::post('/loginkasir', [AuthKasirController::class, 'login'])->name('kasir.login');
Route::get('/logout', [AuthKasirController::class, 'logout'])->name('kasir.logout');

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




//customer
// Route::get('/historicustomer', function () {
//   return view('customer.dashboard_customer.histori_transaksi');
// });
// Route::get('/profilecustomer', function () {
//   return view('customer.dashboard_customer.profile');
// });
// Route::get('/indexcustomer', function () {
//   return view('customer.dashboard_customer.index');
// });

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




// //admin


// //kasir
