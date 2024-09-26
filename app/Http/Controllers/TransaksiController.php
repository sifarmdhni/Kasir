<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
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
        $data_kasir = Auth::guard('kasir')->user();
        $data_payment = Payment::select('id', 'nama_pembayaran')->get();
        $data_produk = Produk::select('id', 'nama_produk', 'harga', 'stok')->get();

        return view('kasir.dashboard_kasir.transaksi', [
            'data_transaksi' => $data_transaksi,
            'data_payment' => $data_payment,
            'data_customer' => $data_customer,
            'data_kasir' => $data_kasir,
            'data_produk' => $data_produk,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_payment' => 'required|integer',
            'customer_id' => 'required|integer',
            'diskon' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'details' => 'required|array',
            'details.*.id_produk' => 'required|integer',
            'details.*.harga' => 'required|numeric',
            'details.*.jumlah' => 'required|integer',
        ]);

        $transaksi = new Transaksi();
        $transaksi->id_payment = $request->id_payment;
        $transaksi->customer_id = $request->customer_id;
        $transaksi->diskon = $request->diskon;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->id_kasir = Auth::guard('kasir')->id();
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

    public function getProductPrice($id)
    {
        $product = Produk::findOrFail($id);
        return response()->json(['harga' => $product->harga]);
    }
}