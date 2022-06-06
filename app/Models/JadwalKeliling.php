<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKeliling extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'tanggal',
        'lokasi',
    ];

    public function jadwalKeliling() {
        return $this->belongsTo(Admin::class);
    }
}
