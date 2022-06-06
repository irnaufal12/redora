<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRequest extends Model
{
    use HasFactory;
    protected $casts = [
        'pendonor' => 'array',
        'pendonor_tanpa_daftar' => 'array'
    ];
    protected $fillable = [
        'user_id',
        'tgl_pembuatan',
        'gol_darah',
        'kontak',
        'status',
        'pendonor',
        'pendonor_tanpa_daftar',
        'keterangan',
    ];

    public function statusRequest() {
        return $this->belongsTo(User::class);
    }

    public function tanpaDaftar()
    {
        return $this->belongsTo(UserTanpaDaftar::class);
    }

    public function idStatus() {
        return $this->hasMany(StatusRequest::class);
    }
}
