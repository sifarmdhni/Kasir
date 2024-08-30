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
        'nama',
        'no_telpon',
        'email',
        'diskon',
    ];

    protected $casts = [
        'diskon' => 'string',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

}
