<?php

namespace App\Models;

use App\Models\kasir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kasir extends Model
{
    use HasFactory;

    protected $table = "kasir";
    
    protected $fillable = [
        'name_kasir',
        'no_telepon',
        'email',
        'password',
        'foto_kasir',
        'jenis_kelamin',
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
}
