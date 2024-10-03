<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Produk',
            'data_kategori' => KategoriProduk::all(),
            'data_produk' => Produk::join('kategoriproduk', 'kategoriproduk.id', '=', 'produk.id_kategori')
                ->select('produk.*', 'kategoriproduk.nama_kategori')
                ->get(),
        ];
        return view('kasir.dashboard_kasir.produk', $data);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_produk' => 'required',
        'id_kategori' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('foto/fotoproduk'), $imageName);
        $validatedData['foto'] = $imageName;
    }

    Produk::create($validatedData);

    return redirect('/produk')->with('success', 'Data Berhasil Ditambahkan');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama_produk' => 'required',
        'id_kategori' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $produk = Produk::findOrFail($id);

    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('foto/fotoproduk'), $imageName);
        $validatedData['foto'] = $imageName;

        // Delete old image
        if ($produk->foto) {
            $oldImagePath = public_path('foto/fotoproduk/' . $produk->foto);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }

    $produk->update($validatedData);

    return redirect('/produk')->with('success', 'Data Berhasil Di Ubah');
}

public function destroy($id)
{
    $produk = Produk::find($id);
    if ($produk) {
        $produk->delete();
        return redirect('/produk')->with('success', 'Data berhasil dihapus');
    } else {
        return redirect('/produk')->with('error', 'User tidak ditemukan');
    }
}
}