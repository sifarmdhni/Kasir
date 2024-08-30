<?php

namespace App\Http\Controllers;
use App\Models\diskon;
use Illuminate\Http\Request;


class DiskonController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Setting Diskon',
            'data_diskon' => diskon::all(),
        ];
        return view('admin.master.diskon.list', $data);
    }

    public function update(Request $request,$id)
        {
        diskon::where('id', $id)
        ->where('id', $id)
        ->update([
         'total_belanja' => $request->total_belanja,
         'diskon' => $request->diskon,
        ]);
        return redirect('/setdiskon')->with('success', 'Data Berhasil Di Ubah');
        }
    
}
