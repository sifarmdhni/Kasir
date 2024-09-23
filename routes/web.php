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
use App\Http\Controllers\AuthProdukController;
use App\Http\Controllers\AuthCustomerController;
use App\Http\Controllers\AuthTransaksiController;
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


//crud data setting diskon
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);


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
Route::get('/register', [AuthAdminController::class, 'index2'])->name("admin.auth.index2");
Route::post('/register', [AuthAdminController::class, 'register'])->name("admin.register");
//laporan produk admin
Route::get('/laporantransaksi', [AuthAdminController::class, 'laporantransaksi']);
Route::post('/laporantransaksi/store', [AuthAdminController::class, 'store'])->name('transaksi.store');
Route::post('/laporantransaksi/update/{id}', [AuthAdminController::class, 'update']);
Route::post('/laporantransaksi/destroy/{id}', [AuthAdminController::class, 'destroy']);

//laporan produk admin
Route::get('/laporanproduk', [AuthAdminController::class, 'laporanproduk']);
Route::post('/laporanproduk/store', [AuthAdminController::class, 'store'])->name('produk.store');
Route::post('/laporanproduk/update/{id}', [AuthAdminController::class, 'update']);
Route::post('/laporanproduk/destroy/{id}', [AuthAdminController::class, 'destroy']);

Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');



//crud data transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::post('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);


//crud data user
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);


Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/update/{id}', [PaymentController::class, 'update']);
Route::post('/payment/destroy/{id}', [PaymentController::class, 'destroy']);


Route::get('/laporantransaksi', [AuthAdminController::class, 'laporantransaksi']);
Route::post('/laporantransaksi/store', [AuthAdminController::class, 'createTransaksi']);
Route::post('/laporantransaksi/update/{id}', [AuthAdminController::class, 'update']);
Route::delete('/laporantransaksi/destroy/{id}', [AuthAdminController::class, 'destroy']);
});


//route login
Route::get('/authadmin', [AuthAdminController::class, 'index'])->name("admin.auth.index");
Route::post('/authadmin', [AuthAdminController::class, 'login'])->name("admin.login");

//kasir
Route::middleware('auth.kasir')->group(function () {
Route::get('/indexkasir', function () {
  return  view('kasir.dashboard_kasir..dashboard');
});
Route::get('/transaksi', function () {
  return  view('kasir.dashboard_kasir.transaksi');
});
Route::get('/cobatransaksi', [TransaksiController::class, 'CreateTransaksi'])->name('transaksi.store');
Route::get('/cobatransaksi/{id}', [TransaksiController::class, 'getCustomerDiscount']);
// Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');


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
Route::get('/logout', [AuthKasirController::class, 'logout'])->name('kasir.logout');
});

Route::get('/authkasir', [AuthKasirController::class, 'index'])->name('kasir.auth.index');
Route::post('/loginkasir', [AuthKasirController::class, 'login'])->name('kasir.login');


//customer
// Route::get('/historicustomer', function () {
//   return view('customer.dashboard_customer.histori_transaksi');
// });
// Route::get('/profilecustomer', function () {
//   return view('customer.dashboard_customer.profile');
// });
// Route::get('/cobatransaksi', function () {
//   return view('kasir.dashboard_kasir.cobatransaksi');
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
