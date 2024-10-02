<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
    public function index()
    {
        $data_produk = Produk::all(); // Fetch all products
        return view('dashboard', compact('data_produk'));
    }

    public function index2(){
        return view('admin.auth_admin.authadmin');
    }
    public function index3(){
        return view('customer.auth_customer.authcustomer');
    }
    public function index4(){
        return view('kasir.auth_kasir.authkasir');
    }
}

