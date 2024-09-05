<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        // Ambil data customer dari model Customer
        $data_customer = customer::all();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'Data Customer', // Pastikan string ini tidak terputus
            'data_customer' => $data_customer,
        ];

        // Kembalikan view dengan data
        return view('customer.dashboard_customer.index', $data);
    }
}
