<?php

namespace App\Models;

use App\Models\payment;
use App\Models\customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_payment',
        'customer_id',
        'customer',
        'diskon',
        'total_harga',
        'id_kasir',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
        'diskon' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'tanggal_transaksi' => 'datetime',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }

    public function itemsCart()
    {
        return $this->hasMany(ItemsCart::class);
    } 

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}