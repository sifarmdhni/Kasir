<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'data_user' => User::all(),
        ];
        return view('admin.master.user.list', $data);
    }

    public function store(Request $request)
    {
        // Log request data
        \Log::info('Request data:', $request->all());
        
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required|integer',
        ]);
        
        // dd('masduk');
        // Log after validation
        \Log::info('Validated data:', $validated);
    
        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
    
        // Log newly created user
        \Log::info('User created:', $user->toArray());
    
        return redirect('/user')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request,$id)
{
        User::where('id', $id)
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        return redirect('/user')->with('success', 'Data Berhasil Di Ubah');
        }
    

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/user')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/user')->with('error', 'User tidak ditemukan');
        }
    }
}
