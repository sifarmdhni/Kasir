<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'seller';

    protected $fillable = [
        'nama_seller',
        'alamat',
        'no_telepon',
    ];
}
