<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\kategori_product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Product::with('kategori')->get();
        return view('product', compact('produk'));
    }

    public function create()
    {
        $kategoriProduk = KategoriProduk::all();
        return view('product', compact('kategoriProduk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_produk,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        Produk::create($validated);
        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        return view('product', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategoriProduk = KategoriProduk::all();
        return view('product', compact('product', 'kategoriProduk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_produk,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        $produk->update($validated);
        return redirect()->route('product')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('product')->with('success', 'Produk berhasil dihapus');
    }
}