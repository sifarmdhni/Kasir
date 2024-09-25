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

    //tessssss
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

    public function index2(){
        return view('customer.auth_customer.register');
    }
    
    
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     // Buat pengguna baru
    //     customer::create([
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // Hash password sebelum menyimpan
    //     ]);

    //     // Login otomatis setelah registrasi
    //     Auth::attempt(['email' => $request->email, 'password' => $request->password]);

    //     // Redirect ke dashboard
    //     return redirect('/authcustomer');
    // }

        public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum menyimpan
        ]);

        // Login otomatis setelah registrasi
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Redirect ke dashboard
        return redirect('/authcustomer');
    }

}
