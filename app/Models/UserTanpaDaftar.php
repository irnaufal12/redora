<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTanpaDaftar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'tgl_lahir',
        'alamat',
        'gol_darah',
        'no_telp',
    ];

    public function userTanpaDaftar()
    {
        return $this->hasMany(UserTanpaDaftar::class);
    }
}
