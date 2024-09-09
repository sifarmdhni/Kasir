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
    
        $kasir = kasir::where('email', $validatedData['email'])->first();
    
        if (!$kasir || !Hash::check($validatedData['password'], $kasir->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);

              
            // Mencoba untuk login dengan kredensial yang diberikan
    //  if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
    
        // Jika login berhasil, arahkan ke dashboard
        return redirect()->intended(route('kasir.auth.index'));
        }
    
    
    
    
        return redirect()->to('/indexkasir');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/authkasir');
    }

}    


