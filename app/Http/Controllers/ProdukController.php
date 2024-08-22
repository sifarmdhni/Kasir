<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\kategori_product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Product::with('kategori')->get();
        return view('product', compact('produks'));
    }

    public function create()
    {
        $kategoriProduks = kategori_product::all();
        return view('product-add', compact('kategoriProduks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_produks,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        Produk::create($validated);
        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        return view('produks.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategoriProduks = KategoriProduk::all();
        return view('produks.edit', compact('produk', 'kategoriProduks'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_produks,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        $produk->update($validated);
        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus');
    }
}