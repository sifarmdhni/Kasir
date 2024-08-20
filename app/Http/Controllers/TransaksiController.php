<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Kasir;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['customer', 'payment', 'kasir'])->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $customers = Customer::all();
        $payments = Payment::all();
        $kasirs = Kasir::all();
        $produks = Produk::all();
        return view('transaksis.create', compact('customers', 'payments', 'kasirs', 'produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'customer_id' => 'required|exists:customers,id',
            'customer' => 'required|string|max:255',
            'diskon' => 'nullable|numeric|min:0|max:100',
            'total_harga' => 'required|numeric|min:0',
            'kasir_id' => 'required|exists:kasirs,id',
            'items' => 'required|array',
            'items.*.produk_id' => 'required|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.harga' => 'required|numeric|min:0'
        ]);

        $transaksi = Transaksi::create($validated);

        foreach ($validated['items'] as $item) {
            $transaksi->itemsCarts()->create($item);
        }

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['customer', 'payment', 'kasir', 'itemsCarts.produk']);
        return view('transaksis.show', compact('transaksi'));
    }

    // Edit dan Update tidak disediakan karena biasanya transaksi tidak diedit setelah dibuat

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->itemsCarts()->delete();
        $transaksi->delete();
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus');
    }
}