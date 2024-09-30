<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailTransaksi;
use App\Models\Transaksi; // Pastikan ini diimpor
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.dashboard_customer.index', compact('customer'));
    }

    public function hitoriTransaksiCustomer()
    {
        $customer = Auth::guard('customer')->user();

        // Fetch all the transaksi with related details for the current customer
        $transaksiGrouped = Transaksi::with(['kasir', 'customer', 'details.produk'])
            ->where('customer_id', $customer->id)
            ->get();

        return view('customer.dashboard_customer.histori_transaksi', [
            'title' => 'Detail Transaksi',
            'transaksiGrouped' => $transaksiGrouped
        ]);
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'diskon' => 'required|numeric|min:0',
            'details' => 'required|array',
            'details.*.produk_id' => 'required|exists:produks,id',
            'details.*.jumlah' => 'required|integer|min:1',
            'details.*.harga' => 'required|numeric',
        ]);

        // Create a new transaction
        $transaksi = Transaksi::create([
            'customer_id' => $request->customer_id,
            'diskon' => $request->diskon,
            // Anda bisa menambahkan atribut lain di sini sesuai kebutuhan
        ]);

        // Save each detail transaksi
        foreach ($request->details as $detail) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $detail['produk_id'],
                'jumlah' => $detail['jumlah'],
                'harga' => $detail['harga'],
                // Anda bisa menambahkan atribut lain di sini sesuai kebutuhan
            ]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Transaksi has been saved successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'nama' => 'required|max:255',
            'no_telpon' => 'required|numeric',
            'email' => 'required|email',
            'diskon' => 'required|numeric|min:0',
        ]);

        // Find the customer by ID and update data
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found');
        }

        // Update customer data
        $customer->nama = $request->input('nama');
        $customer->no_telpon = $request->input('no_telpon');
        $customer->email = $request->input('email');
        $customer->diskon = $request->input('diskon');
        $customer->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Customer data has been updated successfully!');
    }

    public function indexProfileCustomer()
    {
        $profile_customer = Auth::guard('customer')->user();
        return view('customer.dashboard_customer.profile', compact('profile_customer'));
    }

    public function updateProfile(Request $request)
    {
        // Get the currently authenticated customer by ID
        $id = $request->id;
        $customer = Customer::find($id);

        // Check if the customer is found
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }

        // Check if email already exists for another customer
        $existingCustomer = Customer::where('email', $request->email)
            ->where('id', '!=', $id)
            ->first();

        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Email sudah digunakan oleh customer lain.');
        }

        // Update customer data
        $customer->nama = $request->input('nama');
        $customer->email = $request->input('email');

        // Check if the password is being changed
        if ($request->input('password')) {
            $customer->password = Hash::make($request->input('password'));
        }

        // Save the changes
        $customer->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
