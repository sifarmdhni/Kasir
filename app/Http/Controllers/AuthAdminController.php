<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function index(){
        return view('admin.auth_admin.authadmin');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = user::where('email', $validatedData['email'])->first();
    
        // if (!$customer || !Hash::check($validatedData['password'], $customer->password)) {
        //     return back()->withErrors(['email' => 'Email atau password salah.']);
        // }       
            // Mencoba untuk login dengan kredensial yang diberikan
     if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        // Jika login berhasil, arahkan ke dashboard
        return redirect()->intended(route('admin.auth.index'));
    }
    
    
        return redirect()->to('/d_admin');
    }

}    


