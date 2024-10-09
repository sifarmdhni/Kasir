<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();
        return view('seller.seller', compact('sellers'));
    }

    public function create()
    {
        return view('seller.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
        ]);

        Seller::create($request->all());

        return redirect()->route('seller.index')->with('success', 'Seller added successfully');
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        return view('seller.edit', compact('seller'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->update($request->all());

        return redirect()->route('seller.index')->with('success', 'Seller updated successfully');
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();

        return redirect()->route('seller.index')->with('success', 'Seller deleted successfully');
    }
}
