<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        $data = [
            'title' => 'Data Customer
            ',
            'data_customer' => Customer::all(),
            // 'data_produk' => Pr::join('kategoriproduk', 'kategoriproduk.id', '=', 'produk.id_kategori')
            // ->select('produk.*', 'kategoriproduk.nama_kategori')
            // ->get(),
        ];
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