<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembayaran',
        'gambar'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
