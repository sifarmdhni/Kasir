<?php

namespace App\Http\Controllers;

use App\Models\kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DataKasirController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kasir',
            'data_kasir' => Kasir::all(),
        ];
        return view('admin.dashboardadmin.datakasir', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name_kasir' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20|min:11',
            'email' => 'required|string|email|max:255|unique:kasir,email',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        \Log::info('Validated Data: ', $validatedData);
    
        // Handle file upload
        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kasir_photos', $filename);
        }
    
        // Simpan data kasir baru
        kasir::create([
            'name_kasir' => $validatedData['name_kasir'],
            'no_telepon' => $validatedData['no_telepon'],
            'email' => $validatedData['email'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'password' => Hash::make($validatedData['password']),
            'foto' => $filename,
        ]);
    
        return redirect('/datakasir')->with('success', 'Data Berhasil Disimpan');
    }
    
    public function update(Request $request, $id)
    {
        // Ambil data kasir yang akan di-update
        $kasir = kasir::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name_kasir' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20|min:11',
            'email' => 'required|string|email|max:255|unique:kasir,email,' . $kasir->id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($kasir->foto) {
                Storage::delete('public/kasir_photos/' . $kasir->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kasir_photos', $filename);
            $kasir->foto = $filename;
        }

        // Update data kasir
        $kasir->name_kasir = $validatedData['name_kasir'];
        $kasir->no_telepon = $validatedData['no_telepon'];
        $kasir->email = $validatedData['email'];
        $kasir->jenis_kelamin = $validatedData['jenis_kelamin'];

        if (isset($validatedData['password'])) {
            $kasir->password = Hash::make($validatedData['password']);
        }

        $kasir->save();

        return redirect('/datakasir')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $kasir = kasir::findOrFail($id);

        // Check if the kasir has related transactions
        if ($kasir->transaksi()->exists()) {
            return redirect('/datakasir')->with('error', 'Tidak bisa menghapus kasir yang memiliki transaksi terkait');
        }

        // Delete photo if exists
        if ($kasir->foto) {
            Storage::delete('public/kasir_photos/' . $kasir->foto);
        }

        // Delete kasir
        $kasir->delete();

        return redirect('/datakasir')->with('success', 'Data berhasil dihapus');
    }
}