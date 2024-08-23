<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::all();
        return view('kasir.index', compact('kasir'));
    }

    public function create()
    {
        return view('kasirs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:kasir',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|max:2048',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kasir-photos', 'public');
        }

        Kasir::create($validated);
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil ditambahkan');
    }

    public function show(Kasir $kasir)
    {
        return view('kasir.show', compact('kasir'));
    }

    public function edit(Kasir $kasir)
    {
        return view('kasir.edit', compact('kasir'));
    }

    public function update(Request $request, Kasir $kasir)
    {
        $validated = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|email|unique:kasir,email,'.$kasir->id,
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|max:2048',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if ($request->hasFile('foto')) {
            if ($kasir->foto) {
                Storage::disk('public')->delete($kasir->foto);
            }
            $validated['foto'] = $request->file('foto')->store('kasir-photos', 'public');
        }

        $kasir->update($validated);
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil diperbarui');
    }

    public function destroy(Kasir $kasir)
    {
        if ($kasir->foto) {
            Storage::disk('public')->delete($kasir->foto);
        }
        $kasir->delete();
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dihapus');
    }
}