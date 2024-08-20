<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $table = "product";

    protected $fillable = [
        'nama',
        'kategori_produk_id',
        'harga',
        'stok'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function kategori_product()
    {
        return $this->belongsTo(kategori_product::class);
    }

    public function items_transaksi()
    {
        return $this->hasMany(items_transaksi::class);
    }
}
