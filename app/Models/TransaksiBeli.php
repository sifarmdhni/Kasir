<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBeli extends Model
{
    use HasFactory;

    protected $table = 'transaksi_beli';

    protected $fillable = [
        'id_kasir',
        'id_seller',
        'id_produk',
        'jumlah',
        'total_harga',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
