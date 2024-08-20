<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategoriProduks = KategoriProduk::all();
        return view('kategori_produks.index', compact('kategoriProduks'));
    }

    public function create()
    {
        return view('kategori_produks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produks'
        ]);

        KategoriProduk::create($validated);
        return redirect()->route('kategori_produks.index')->with('success', 'Kategori Produk berhasil ditambahkan');
    }

    public function show(KategoriProduk $kategoriProduk)
    {
        return view('kategori_produks.show', compact('kategoriProduk'));
    }

    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('kategori_produks.edit', compact('kategoriProduk'));
    }

    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_produks,nama_kategori,'.$kategoriProduk->id
        ]);

        $kategoriProduk->update($validated);
        return redirect()->route('kategori_produks.index')->with('success', 'Kategori Produk berhasil diperbarui');
    }

    public function destroy(KategoriProduk $kategoriProduk)
    {
        $kategoriProduk->delete();
        return redirect()->route('kategori_produks.index')->with('success', 'Kategori Produk berhasil dihapus');
    }
}