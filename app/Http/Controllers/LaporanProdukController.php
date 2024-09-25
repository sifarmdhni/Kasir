<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Mengimpor model Produk
use Illuminate\Http\Request;

class LaporanProdukController extends Controller
{
    public function laporanproduk(Request $request)
    {
        // Mengambil semua data produk dari tabel produk
        $produk = Produk::all();

        // Mengembalikan data ke view
        return view('admin.dashboardadmin.laporanproduk', [
            'title' => 'Laporan Produk',
            'produk' => $produk
        ]);
    }
}
