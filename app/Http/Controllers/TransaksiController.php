<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function dashboard()
    {
        $dashboardData = $this->getDashboardData();
        return view('kasir.dashboard_kasir.dashboard', compact('dashboardData'));
    }

    private function getDashboardData()
{
    $today = Carbon::today();
    $incomeData = [];

    // Calculate daily income for the last 7 days
    for ($i = 6; $i >= 0; $i--) {
        $date = $today->copy()->subDays($i);
        $dailyIncome = Transaksi::whereDate('created_at', $date)->sum('total_harga');
        $incomeData[] = [
            'date' => $date->format('d F Y'),
            'income' => $dailyIncome,
        ];
    }

    return [
        'products_sold' => DetailTransaksi::whereDate('created_at', $today)->sum('jumlah'),
        'daily_income' => Transaksi::whereDate('created_at', $today)->sum('total_harga'),
        'new_customers' => Customer::whereDate('created_at', $today)->count(),
        'total_stock' => Produk::sum('stok'),
        'income_data' => $incomeData,
    ];
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
            'total_harga' => 'required|numeric',
            'details' => 'required|array',
            'details.*.id_produk' => 'required|integer',
            'details.*.harga' => 'required|numeric',
            'details.*.jumlah' => 'required|integer',
        ]);
    
        $subtotal = 0;
        foreach ($request->details as $detail) {
            $subtotal += $detail['harga'] * $detail['jumlah'];
        }
    
        $diskon = $subtotal > 100000 ? 10 : 0; // 10% discount for transactions over 100,000
        $total_harga = $subtotal * (1 - $diskon / 100);
    
        $transaksi = new Transaksi();
        $transaksi->id_payment = $request->id_payment;
        $transaksi->customer_id = $request->customer_id;
        $transaksi->diskon = $diskon;
        $transaksi->total_harga = $total_harga;
        $transaksi->id_kasir = Auth::guard('kasir')->id();
        $transaksi->save();
    
        foreach ($request->details as $detail) {
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->id_transaksi = $transaksi->id;
            $detailTransaksi->id_produk = $detail['id_produk'];
            $detailTransaksi->harga = $detail['harga'];
            $detailTransaksi->jumlah = $detail['jumlah'];
            $detailTransaksi->save();
    
            // Reduce stock
            $product = Produk::find($detail['id_produk']);
            $product->stok -= $detail['jumlah'];
            $product->save();
        }
    
        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan!');
    }


    public function getProductPrice($id)
    {
        $product = Produk::findOrFail($id);
        return response()->json(['harga' => $product->harga]);
    }

    public function cetakTransaksi($id)
{
    $transaksi = Transaksi::with(['kasir', 'customer', 'detailTransaksi.produk'])->findOrFail($id);
    
    return view('cetak-transaksi', compact('transaksi'));
}
}