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
        return view('admin.master.produk.list', $data);
    }

    public function store(Request $request)
    {
        Produk::create([
        'nama_produk' => $request->nama_produk,
        'id_kategori' => $request->id_kategori,
        'harga' => $request->harga,
        'stok' => $request->stok,
       ]);
       return redirect('/produk')->with('success', 'Data Berhasil Di Ubah');
    }

    public function update(Request $request,$id)
{
        Produk::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
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