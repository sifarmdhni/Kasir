<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KasirController extends Controller
{
    public function profile()
    {
        $kasir = Auth::guard('kasir')->user();
        return view('kasir.profile', compact('kasir'));
    }

    public function updateProfile(Request $request)
    {
        $kasir = Auth::guard('kasir')->user();

        $request->validate([
            'name_kasir' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:kasir,email,'.$kasir->id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kasir->name_kasir = $request->name_kasir;
        $kasir->no_telepon = $request->no_telepon;
        $kasir->email = $request->email;
        $kasir->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if ($kasir->foto) {
                Storage::delete('public/kasir_photos/' . $kasir->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kasir_photos', $filename);
            $kasir->foto = $filename;
        }

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $kasir->password = Hash::make($request->password);
        }

        $kasir->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}