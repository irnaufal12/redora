<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status_request_id',
        'tgl_pembuatan',
        'tgl_konfirmasi',
        'konfirmasi',
    ];

    public function idUser() {
        return $this->belongsTo(User::class);
    }

    public function idStatusRequest () {
        return $this->belongsTo(StatusRequest::class);
    }
}
