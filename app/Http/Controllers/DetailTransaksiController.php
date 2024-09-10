<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        // Fetch all the detail_transaksi with the related transaksi, kasir, and produk data
        $detailTransaksi = DetailTransaksi::with(['transaksi.kasir', 'transaksi.customer', 'produk'])
            ->get();

        // Return the data to the view
        return view('customer.detail_transaksi.index', [
            'title' => 'Detail Transaksi',
            'detailTransaksi' => $detailTransaksi
        ]);
    }
}
