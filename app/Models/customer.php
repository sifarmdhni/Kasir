<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Foundation\Auth\User as Authenticatable; // Menggunakan User sebagai Authenticatable
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customer extends Authenticatable
{
    use HasFactory;

    
    protected $table = "customer";

    protected $fillable = [
        'nama',
        'no_telpon',
        'email',
        'diskon',
    ];

    protected $casts = [
        'diskon' => 'string',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

}
