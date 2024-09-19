<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\KasirController;

class KasirController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard page',
        );
        return view('dashboard', $data);
    }

    public function store(Request $request)
    {
        
        // Validasi input
  $request->validate([
     'name_kasir' => 'required|string|max:100',
    'no_telepon' => 'required|string|max:15',
    'email' => 'required|string|email|max:100|unique:kasir,email',
    'password' => 'required|string|min:6',
    'foto_kasir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
   'jenis_kelamin' => 'required|in:Laki laki,Perempuan',

    
 ]);
        Kasir::create([
        'name_kasir'=> $request->name_kasir,
        'no_telepon'=> $request->no_telepon,
        'email'=> $request->email,
        'password' => Hash::make($request->password), // Menggunakan Hash untuk mengamankan password
        'foto_kasir' => $request->file('foto_kasir')->store('foto', 'public'),
        'jenis_kelamin'=> $request->jenis_kelamin,
       ]);

       return redirect('/kasir')->with('success', 'Data Berhasil Di Ubah');
    }

    public function update(Request $request,$id)
    {

         // Validasi input
  $request->validate([
    'name_kasir' => 'required|string|max:100',
   'no_telepon' => 'required|string|max:15',
   'email' => 'required|string|email|max:100|unique:kasir,email',
   'password' => 'required|string|min:6',
   'foto_kasir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
  'jenis_kelamin' => 'required|in:Laki laki,Perempuan',

   
]);


         Kasir::where('id', $id)
        ->where('id', $id)
        ->update([
        'name_kasir'=> $request->name_kasir,
        'no_telepon'=> $request->no_telepon,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Menggunakan Hash untuk mengamankan password
        'foto_kasir' =>  $request->file('foto_kasir')->store('foto', 'public'),
        'jenis_kelamin'=> $request->jenis_kelamin,
            ]);
            return redirect('/kasir')->with('success', 'Data Berhasil Di Ubah');
            }
        
            public function destroy($id)
            {
                $kasir = Kasir::find($id);
                if ($kasir) {
                    $kasir->delete();
                    return redirect('/kasir')->with('success', 'Data berhasil dihapus');
                } else {
                    return redirect('/kasir')->with('error', 'User tidak ditemukan');
                }
            }


//     public function store(Request $request)
//     {

//  // Validasi input
//  $request->validate([
//     'name_kasir' => 'required|string|max:100',
//     'no_telepon' => 'required|string|max:15',
//     'email' => 'required|string|email|max:100|unique:kasir,email',
//     'password' => 'required|string|min:6',
//     'foto_kasir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//     'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',

    
// ]);
// // dd($request->all);

//    // Meng-handle file foto
//    if ($request->hasFile('foto_kasir')) {
//     // Simpan foto ke folder public/foto_kasir
//     $filePath = $request->file('foto_kasir')->store('assets/poto', 'public');
// } else {
//     $filePath = null;
// }

// // Simpan data ke database menggunakan metode create
// Kasir::create([
//     'name_kasir' => $request->name_kasir,
//     'no_telepon' => $request->no_telepon,
//     'email' => $request->email,
//     'password' => Hash::make($request->password), // Menggunakan Hash untuk mengamankan password
//     'foto_kasir' => $filePath, 
//     'jenis_kelamin' => $request->jenis_kelamin,
// ]);


// // Redirect kembali dengan pesan sukses
// return redirect()->back()->with('success', 'Kasir berhasil ditambahkan!');
// }
       

//     public function show(Kasir $kasir)
//     {
//         return view('kasir.show', compact('kasir'));
//     }


//     public function edit(Kasir $kasir)
//     {
//         return view('kasir.edit', compact('kasir'));
//     }

//     public function update(Request $request, Kasir $kasir)
//     {
//         $validated = $request->validate([
//             'nama_kasir' => 'required|string|max:255',
//             'no_telp' => 'nullable|string|max:20',
//             'email' => 'required|email|unique:kasir,email,'.$kasir->id,
//             'password' => 'nullable|min:6',
//             'foto_kasir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'jenis_kelamin' => 'required',
//         ]);
        

//         if ($request->filled('password')) {
//             $validated['password'] = Hash::make($validated['password']);
//         } else {
//             unset($validated['password']);
//         }

//         if ($request->hasFile('foto_kasir')) {
//             $fileName = time() . '_' . $request->file('foto_kasir')->getClientOriginalName();
//             $filePath = $request->file('foto_kasir')->storeAs('uploads/kasir', $fileName, 'public');
//         }

//         if ($e->errorInfo[1] == 1062) {
//             return back()->withErrors(['email' => 'Email sudah digunakan, silakan gunakan email lain.']);
//         }

//         $kasir->update($validated);
//         return redirect()->route('kasir.index')->with('success', 'Kasir berhasil diperbarui');
//     }

//     public function destroy(Kasir $kasir)
//     {
//         if ($kasir->foto) {
//             Storage::disk('public')->delete($kasir->foto);
//         }
//         $kasir->delete();
//         return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dihapus');
//     }
}