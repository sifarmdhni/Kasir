<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembayaran',
        'gambar'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
