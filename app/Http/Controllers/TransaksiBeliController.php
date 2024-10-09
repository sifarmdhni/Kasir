<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBeli;
use App\Models\Produk;
use App\Models\Kasir;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiBeliController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi Pembelian Stok',
            'data_kasir' => Kasir::all(),
            'data_seller' => Seller::all(),
            'data_produk' => Produk::all(),
            'data_transaksi' => TransaksiBeli::with(['kasir', 'seller', 'produk'])->get(),
        ];
        return view('kasir.dashboard_kasir.transaksi_beli', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kasir' => 'required|exists:kasir,id',
            'id_seller' => 'required|exists:seller,id',
            'id_produk' => 'required|exists:produk,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
           // Update stock after purchase from seller
           $produk = Produk::findOrFail($request->id_produk);
           $produk->stok += $request->jumlah;
           $produk->save();


            // Create transaction record
            TransaksiBeli::create([
                'id_kasir' => $request->id_kasir,
                'id_seller' => $request->id_seller,
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
                'total_harga' => $request->total_harga,
            ]);

            DB::commit();
            return redirect('/transaksi-beli')->with('success', 'Transaksi Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/transaksi-beli')->with('error', 'Terjadi kesalahan saat transaksi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $transaksi = TransaksiBeli::find($id);

        if (!$transaksi) {
            return redirect('/transaksi-beli')->with('error', 'Transaksi tidak ditemukan');
        }

        DB::beginTransaction();
        try {
            // Rollback stock when transaction is deleted
            $produk = Produk::findOrFail($transaksi->id_produk);
            $produk->stok -= $transaksi->jumlah;
            $produk->save();

            // Delete the transaction
            $transaksi->delete();

            DB::commit();
            return redirect('/transaksi-beli')->with('success', 'Transaksi berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/transaksi-beli')->with('error', 'Terjadi kesalahan saat menghapus transaksi: ' . $e->getMessage());
        }
    }
}
