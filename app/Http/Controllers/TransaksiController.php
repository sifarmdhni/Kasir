<?php

namespace App\Http\Controllers;

use App\Models\kasir;
use App\Models\produk;
use App\Models\payment;
use App\Models\customer;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\detailtransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data transaksi',
            'data_transaksi' => Transaksi::all(),
        ];
        return view('kasir.dashboard_kasir.transaksi', $data);
    }

    public function createTransaksi()
    {
        $data_transaksi = Transaksi::all();
        $data_customer = Customer::select('id', 'nama', 'diskon')->get();
        $data_kasir =Auth::guard('kasir')->user();
        


    
        return view('kasir.dashboard_kasir.cobatransaksi', [
            'data_transaksi' => $data_transaksi,
            'data_customer' => $data_customer,
            'data_kasir' => $data_kasir,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'diskon' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'id_kasir' => 'required|integer',
            'details' => 'required|array',
            'details.*.id_produk' => 'required|integer',
            'details.*.harga' => 'required|numeric',
            'details.*.jumlah' => 'required|integer',
        ]);

        $transaksi = new Transaksi();
        $transaksi->customer_id = $request->customer_id;
        $transaksi->diskon = $request->diskon;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->id_kasir = $request->id_kasir;
        $transaksi->save();

        foreach ($request->details as $detail) {
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->id_transaksi = $transaksi->id;
            $detailTransaksi->id_produk = $detail['id_produk'];
            $detailTransaksi->harga = $detail['harga'];
            $detailTransaksi->jumlah = $detail['jumlah'];
            $detailTransaksi->save();
        }

        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan!');
    }
}