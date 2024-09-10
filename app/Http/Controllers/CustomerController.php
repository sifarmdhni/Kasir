<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\detailtransaksi;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{

    public function index(){
        return view('customer.dashboard_customer.index');
    }

    public function hitoriTransaksiCustomer()
    {
        // Fetch all the detail_transaksi with the related transaksi, kasir, and produk data
        $detailTransaksi = detailtransaksi::with(['transaksi.kasir', 'transaksi.customer', 'produk'])
            ->get();

        // Return the data to the view
        return view('customer.dashboard_customer.histori_transaksi', [
            'title' => 'Detail Transaksi',
            'detailTransaksi' => $detailTransaksi
        ]);
    }

    public function getDataCustomer(){
        
    }
    // Store new customer data
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'nama_kasir' => 'required|max:255',
            'nama_customer' => 'required|max:255',
            'nama_produk' => 'required|max:255',
            'total_harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric|min:0',
        ]);

        // Save the customer data
        Customer::create([
            'nama_kasir' => $request->input('nama_kasir'),
            'nama_customer' => $request->input('nama_customer'),
            'nama_produk' => $request->input('nama_produk'),
            'total_harga' => $request->input('total_harga'),
            'jumlah' => $request->input('jumlah'),
            'harga' => $request->input('harga'),
            'diskon' => $request->input('diskon'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Customer data has been saved successfully!');
    }

    // Update existing customer data
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

    // profile customer
    public function indexProfileCustomer(){
        $profile_customer = customer::first();
        return view('customer.dashboard_customer.profile',  compact('profile_customer'));
    }

    // public function indexProfileCustomer()
    // {
    //     // Ambil customer_id dari cookie
    //     $customerId = request()->cookie('customer_id');
    
    //     if ($customerId) {
    //         $profile_customer = customer::find($customerId);
    
    //         if ($profile_customer) {
    //             return view('customer.dashboard_customer.profile', compact('profile_customer'));
    //         } else {
    //             return redirect()->route('customer.auth.index')->withErrors(['message' => 'Customer not found.']);
    //         }
    //     } else {
    //         return redirect()->route('customer.auth.index')->withErrors(['message' => 'Please login first.']);
    //     }
    // }
    


      // Update profile
      public function updateProfile(Request $request)
      {
  
          // Get the currently authenticated customer
          $id = $request->id;  // Or whatever the ID field is in your form/request
          $customer = Customer::find($id);
          $customer = Customer::where('email', $request->email)->first();
  
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