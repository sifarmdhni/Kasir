<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customer',
            'diskon' => 'nullable|numeric|min:0|max:100'
        ]);

        Customer::create($validated);
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customer,email,'.$customer->id,
            'diskon' => 'nullable|numeric|min:0|max:100'
        ]);

        $customer->update($validated);
        return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus');
    }
}