<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('product.index', compact('produk'));
    }

    public function create()
    {
        $kategoriProduks = KategoriProduk::all();
        return view('product.create', compact('kategoriProduk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_product,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        Produk::create($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        return view('product.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $kategoriProduks = KategoriProduk::all();
        return view('product.edit', compact('produk', 'kategoriProduct'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_product,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        $produk->update($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}