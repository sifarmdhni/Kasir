<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Mengimpor model Transaksi
use Illuminate\Http\Request;

class LaporanTransaksiController extends Controller
{
    public function laporantransaksi(Request $request)
    {
        // Mengambil semua transaksi beserta relasi yang diperlukan
        $transaksi = Transaksi::with(['kasir', 'customer', 'detailTransaksi.produk'])->get();

        return view('admin.dashboardadmin.laporantransaksi', [
            'title' => 'Laporan Transaksi',
            'transaksi' => $transaksi
        ]);
    }
}
