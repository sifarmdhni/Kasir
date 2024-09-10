<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;


class CustomerKasirController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Customer',
            'data_customer' => customer::all(),
        ];
        return view('kasir.dashboard_kasir.customerkasir', $data);
    }

    public function store(Request $request)
    {
        customer::create([
        'nama'  => $request->nama,
        'no_telpon'  => $request->no_telpon,
        'email'  => $request->email,
        'diskon'  => $request->diskon,
       ]);
       return redirect('/customerkasir')->with('success', 'Data Berhasil Di Ubah');
    }

    public function update(Request $request,$id)
    {
       customer::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama'  => $request->nama,
            'no_telpon'  => $request->no_telpon,
            'email'  => $request->email,
            'diskon'  => $request->diskon,
        ]);
        return redirect('/customerkasir')->with('success', 'Data Berhasil Di Ubah');
        }
    

        public function destroy($id)
        {
            $customer = customer::find($id);
            if ($customer) {
                $customer->delete();
                return redirect('/customerkasir')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/customerkasir')->with('error', 'User tidak ditemukan');
            }
        }
}

