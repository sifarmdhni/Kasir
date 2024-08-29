<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customer extends Model
{
    use HasFactory;

    
    protected $table = "customer";

    protected $fillable = [
        'name',
        'no_telp',
        'email',
        'diskon',
    ];

    protected $casts = [
        'diskon' => 'decimal',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
