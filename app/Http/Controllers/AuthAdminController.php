<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\detailtransaksi;
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

           // Menggunakan Auth guard 'customer'
           if (Auth::guard('admin')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Jika login berhasil, arahkan ke halaman dashboard customer
            return redirect()->intended('/d_admin');
        }

        return redirect()->to('/authadmin');
    }

    public function index2(){
        return view('admin.auth_admin.register');
    }
    
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum menyimpan
        ]);

        // Login otomatis setelah registrasi
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Redirect ke dashboard
        return redirect('/authadmin');
    }
    public function laporantransaksi(Request $request)
    {
        $detailTransaksi = detailtransaksi::with(['kasir', 'customer', 'produk'])
        ->get();

    // Return the data to the view
    return view('admin.dashboardadmin.laporantransaksi', [
        'title' => 'Detail Transaksi',
        'detailTransaksi' => $detailTransaksi
    ]);
    }
    public function laporanproduk(Request $request)
    {
        $produk = Produk::with([])
        ->get();

    // Return the data to the view
    return view('admin.dashboardadmin.laporanproduk', [
        'title' => 'Laporan Produk',
        'produk' => $produk
    ]);
    }  
    public function logout()
    {
        Auth::guard('admin')->logout();  // Logout dari guard 'customer'
        return redirect('/authadmin');
    }
     
    
}
