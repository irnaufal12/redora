<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manfaat extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'tanggal',
        'judul',
        'isi', 
    ];

    public function manfaat() {
        return $this->belongsTo(Admin::class);
    }
}
