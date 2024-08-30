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
            'data_payment' => Payment::all(),
        ];
        return view('admin.payment.list', $data);
    }
    public function store(Request $request)
    {
        Payment::create([
            'nama_payment' => $request->nama_payment,
        ]);
        return redirect('/payment')->with('success', 'Data Berhasil Di Ubah');
    }
    
    public function update(Request $request,$id)
    {
        Payment::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_payment' => $request->nama_kategori,
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