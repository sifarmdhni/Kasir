<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $data = array(
            'title'=> 'Dashboard Page'
        );
        return view('dashboard', $data);
        //return view('dashboard', $data);
        
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

