<?php

namespace App\Models;

use App\Models\kategoriproduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategoriproduk extends Model
{
    use HasFactory;

    protected $table = 'kategoriproduct';

    protected $fillable = [
        'nama_kategori',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // public function product()
    // {
    //     return $this->hasMany(product::class);
    // }

}
