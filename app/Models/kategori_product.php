<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori_product extends Model
{
    use HasFactory;

    protected $table = 'kategori_product';

    protected $fillable = [
        'nama_kategori'
    ];

    public function product()
    {
        return $this->hasMany(product::class);
    }

}
