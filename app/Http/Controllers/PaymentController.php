<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Silahkan Pilih Pembayaran',
            'nama_payment' => Payment::all(),
        ];
        return view('admin.dashboardadmin.payment', $data);
    }
    public function store(Request $request)
    {
        \Log::info('Request data:', $request->all());
        
        $validated = $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'gambar' => 'required',
            
        ]);

        \Log::info('Validated data:', $validated);

     $payment = Payment::create([
            'nama_pembayaran' => $request->nama_pembayaran,
            'gambar' => $request->gambar,
        ]);

        \Log::info('Payment created:', $payment->toArray());

        return redirect('/payment')->with('success', 'Data Berhasil Di Ubah');
    }
    
    public function update(Request $request,$id)
    {
        Payment::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_pembayaran' => $request->nama_pembayaran,
            'gambar' => $request->gambar,
        ]);
        return redirect('/payment')->with('success', 'Data Berhasil Di Ubah');
    }
    
    
    public function destroy($id)
        {
            $payment = Payment::find($id);
            if ($payment) {
                $payment->delete();
                return redirect('/payment')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/payment')->with('error', 'User tidak ditemukan');
            }
        }
        public function bca()
        {
            $data = [
                'title' => ' Pembayaran Succes',
            ];
            return view('admin.payment.paymentberhasil', $data);
        }
    }