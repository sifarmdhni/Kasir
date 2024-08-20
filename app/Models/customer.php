<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'diskon',
    ];

    protected $casts = [
        'diskon' => 'decimal:2',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
