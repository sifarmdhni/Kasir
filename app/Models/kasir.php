<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kasir extends Model
{
    use HasFactory;

    protected $table = "kasir";
    
    protected $fillable = [
        'nama_kasir',
        'no_telp',
        'email',
        'password',
        'foto',
        'jenis_kelamin',
    ];

    protected $hidden = [
        'password',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
