<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'tanggal',
        'isi',
    ];

    public function prosedur() {
        return $this->belongsTo(Admin::class);
    }
}
