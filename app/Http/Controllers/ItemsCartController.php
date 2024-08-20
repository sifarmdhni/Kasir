<?php

namespace App\Http\Controllers;

use App\Models\ItemsCart;
use Illuminate\Http\Request;

class ItemsCartController extends Controller
{
    // ItemsCart biasanya tidak memiliki CRUD tersendiri karena dikelola melalui Transaksi
    // Namun, jika diperlukan, Anda bisa menambahkan metode-metode berikut

    public function index()
    {
        $itemsCarts = ItemsCart::with(['transaksi', 'produk'])->get();
        return view('items_carts.index', compact('itemsCarts'));
    }

    public function show(ItemsCart $itemsCart)
    {
        return view('items_carts.show', compact('itemsCart'));
    }
}