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

        $customer = customer::where('email', $validatedData['email'])->first();

        if (!$customer || !Hash::check($validatedData['password'], $customer->password)) {
             // Simpan customer_id di cookie selama 60 menit
        cookie()->queue(cookie('customer_id', $customer->id, 60)); 
            // dd(session('customer'));
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }       
        // Mencoba untuk login dengan kredensial yang diberikan
        // if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        //     // Jika login berhasil, arahkan ke dashboard
        //     return redirect()->intended(route('customer.auth.index'));
        // }

        return redirect()->to('/indexcustomer');
    }
}
