<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'harga',
        'stok', 
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // use HasFactory;

    // protected $table = "product";

    // protected $fillable = [
    //     'nama',
    //     'kategori_produk_id',
    //     'harga',
    //     'stok'
    // ];

    // protected $casts = [
    //     'harga' => 'decimal:2',
    // ];

    // public function kategori_product()
    // {
    //     return $this->belongsTo(kategori_produc::class);
    // }

    // public function items_transaksi()
    // {
    //     return $this->hasMany(items_transaksi::class);
    // }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk');
    }

    public function kategori()
{
    return $this->belongsTo(KategoriProduk::class, 'id_kategori');
}

}
