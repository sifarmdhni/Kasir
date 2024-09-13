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
    
    public function index2(){
        return view('admin.auth_admin.register');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $validatedData['email'])->first();
    
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }
    
        // Mencoba untuk login dengan kredensial yang diberikan
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Jika login berhasil, arahkan ke dashboard
            return redirect()->intended(route('admin.auth.index'));
        }
    
        return redirect()->to('/d_admin');
    }
    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $validatedData['email'])->first();
    
        if ($user) {
            return back()->withErrors(['email' => 'Email sudah digunakan.']);
        }
    
        // Buat pengguna baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role_id' => $validatedData['role_id'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Mencoba untuk login dengan kredensial yang diberikan
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Jika login berhasil, arahkan ke dashboard
            return redirect()->intended(route('admin.auth.index2'));
        }
    
        return redirect()->to('/authadmin');
    }
    
}
