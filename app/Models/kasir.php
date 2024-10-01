<?php

namespace App\Models;

use App\Models\kasir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kasir extends Authenticatable
{
    use HasFactory;

    protected $table = "kasir";
    
   
        protected $fillable = [
            'name_kasir',
            'no_telepon',
            'email',
            'jenis_kelamin',
            'password',
            'foto',
        ];
    
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function kasir()
    {
        return $this->hasMany(Kasir::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_kasir');
    }
}
