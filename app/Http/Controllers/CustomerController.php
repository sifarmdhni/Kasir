<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
{
    // Ambil data customer dari model Customer
    $data_customer = Customer::all();

    // Siapkan data untuk dikirim ke view
    $data = [
        'title' => 'Data Customer', // Pastikan string ini tidak terputus
        'data_customer' => $data_customer,
    ];

    // Kembalikan view dengan data
    return view('admin.customer.list', $data);
}


    public function store(Request $request)
    {
        Customer::create([
        'name' => $request->name,
        'no_telp' => $request->no_telp,
        'email' => $request->email,
        'diskon' => $request->diskon,
       ]);
       return redirect('/customer')->with('success', 'Data Berhasil Di Ubah');
    }

    public function update(Request $request,$id)
{
        Customer::where('id', $id)
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'diskon' => $request->diskon,
        ]);
        return redirect('/customer')->with('success', 'Data Berhasil Di Ubah');
        }
    

        public function destroy($id)
        {
            $customer = Customer::find($id);
            if ($customer) {
                $customer->delete();
                return redirect('/costumer')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/customer')->with('error', 'User tidak ditemukan');
            }
        }
}