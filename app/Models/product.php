<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori_produk_id',
        'harga',
        'stok'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }

    public function itemsCarts()
    {
        return $this->hasMany(ItemsCart::class);
    }
}
