<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCustomerController extends Controller
{

    public function index(){
        return view("customer.auth_customer.authcustomer");
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

           // Menggunakan Auth guard 'customer'
           if (Auth::guard('customer')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Jika login berhasil, arahkan ke halaman dashboard customer
            return redirect()->intended('/indexcustomer');
        }

        return redirect()->to('/indexcustomer');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();  // Logout dari guard 'customer'
        return redirect('/authcustomer');
    }
}
