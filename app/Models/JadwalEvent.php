<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'nama_event',
        'tanggal',
        'lokasi',
    ];

    public function jadwalEvent()
    {
        return $this->belongsTo(Admin::class);
    }
}
