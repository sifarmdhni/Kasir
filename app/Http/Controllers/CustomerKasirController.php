<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk hashing password

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
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|email|unique:customer,email', // Email harus unik
            'password' => 'required|string|min:8',
            'diskon' => 'required|numeric|min:0',
        ]);

        // Simpan data customer baru
        customer::create([
            'nama'  => $request->nama,
            'no_telpon'  => $request->no_telpon,
            'email'  => $request->email,
            'password'  => Hash::make($request->password), // Hashing password
            'diskon'  => $request->diskon,
        ]);

        return redirect('/customerkasir')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|email|unique:customer,email,' . $id, // Email harus unik kecuali untuk customer ini
            'password' => 'nullable|string|min:8', // Password tidak harus diisi
            'diskon' => 'required|numeric|min:0',
        ]);

        // Ambil data customer yang akan di-update
        $customer = customer::findOrFail($id); // Menemukan customer atau memunculkan error jika tidak ada

        // Update data customer
        $customer->update([
            'nama'  => $request->nama,
            'no_telpon'  => $request->no_telpon,
            'email'  => $request->email,
            'password'  => $request->password ? Hash::make($request->password) : $customer->password, // Update password hanya jika diisi
            'diskon'  => $request->diskon,
        ]);

        return redirect('/customerkasir')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $customer = customer::find($id);

        if ($customer) {
            // Cek apakah customer memiliki relasi dengan transaksi
            if ($customer->transaksi()->exists()) {
                return redirect('/customerkasir')->with('error', 'Tidak bisa menghapus customer yang memiliki transaksi terkait');
            }

            // Hapus customer
            $customer->delete();

            return redirect('/customerkasir')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/customerkasir')->with('error', 'Customer tidak ditemukan');
        }
    }
}
