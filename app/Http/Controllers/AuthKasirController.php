<?php

namespace App\Http\Controllers;

use App\Models\kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthKasirController extends Controller
{
    public function index(){
        return view('kasir.auth_kasir.authkasir');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
      // Menggunakan Auth guard 'customer'
      if (Auth::guard('kasir')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        // Jika login berhasil, arahkan ke halaman dashboard customer
        return redirect()->intended('/indexkasir');
    }

    
    
    
        return redirect()->to('/indexkasir');
    }
    public function logout()
    {
        Auth::guard('kasir')->logout();  // Logout dari guard 'customer'
        return redirect('/authkasir');
    }

}    


