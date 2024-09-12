<?php

namespace App\Http\Controllers;

use App\Models\kasir;
use App\Models\produk;
use App\Models\payment;
use App\Models\customer;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\detailtransaksi;

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

    public function CreateTransaksi(){
        $data = [
            'data_transaksi' => transaksi::with('customer')->get(),
        ];
        return view('kasir.dashboard_kasir.cobatransaksi', $data);
    }
    public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'customer_id' => 'required|integer',
        'diskon' => 'required|numeric',
        'total_harga' => 'required|numeric',
        'id_kasir' => 'required|integer',
        'details.*.id_produk' => 'required|integer',
        'details.*.harga' => 'required|numeric',
        'details.*.jumlah' => 'required|integer',
    ]);

    // Buat transaksi baru
    $transaksi = new transaksi();
    $transaksi->customer_id = $request->customer_id;
    $transaksi->diskon = $request->diskon;
    $transaksi->total_harga = $request->total_harga;
    $transaksi->id_kasir = $request->id_kasir;
    $transaksi->save();

    // Simpan detail transaksi
    foreach ($request->details as $detail) {
        $detailTransaksi = new detailtransaksi();
        $detailTransaksi->id_transaksi = $transaksi->id;
        $detailTransaksi->id_produk = $detail['id_produk'];
        $detailTransaksi->harga = $detail['harga'];
        $detailTransaksi->jumlah = $detail['jumlah'];
        $detailTransaksi->save();
    }

    return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan!');
}


    // public function index()
    // {

    //     $data_produk = Transaksi::all();
    //     $title = 'Daftar Transaksi';
    //     return view('kasir.transaksi.list', compact('data_produk', 'title'));
    // }

    public function create()
    {
        $data = [
            'title' => 'create data transaksi',
        ];
        return view('kasir.transaksi.list', $data);
    }







    // public function index()
    // {
    //     $transaksi = Transaksi::with(['customer', 'payment', 'kasir'])->get();
    //     return view('transaksi.index', compact('transaksi'));
    // }

    // public function create()
    // {
    //     $customer = Customer::all();
    //     $payment = Payment::all();
    //     $kasir = Kasir::all();
    //     $produk = Product::all();
    //     return view('transaksi.create', compact('customer', 'payment', 'kasir', 'produk'));
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'payment_id' => 'required|exists:payment,id',
    //         'customer_id' => 'required|exists:customer,id',
    //         'customer' => 'required|string|max:255',
    //         'diskon' => 'nullable|numeric|min:0|max:100',
    //         'total_harga' => 'required|numeric|min:0',
    //         'kasir_id' => 'required|exists:kasir,id',
    //         'items' => 'required|array',
    //         'items.*.produk_id' => 'required|exists:produk,id',
    //         'items.*.jumlah' => 'required|integer|min:1',
    //         'items.*.harga' => 'required|numeric|min:0'
    //     ]);

    //     $transaksi = Transaksi::create($validated);

    //     foreach ($validated['items'] as $item) {
    //         $transaksi->itemsCarts()->create($item);
    //     }

    //     return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    // }

    // public function show(Transaksi $transaksi)
    // {
    //     $transaksi->load(['customer', 'payment', 'kasir', 'itemsCarts.produk']);
    //     return view('transaksi.show', compact('transaksi'));
    // }

    // // Edit dan Update tidak disediakan karena biasanya transaksi tidak diedit setelah dibuat

    // public function destroy(Transaksi $transaksi)
    // {
    //     $transaksi->itemsCarts()->delete();
    //     $transaksi->delete();
    //     return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    // }
}