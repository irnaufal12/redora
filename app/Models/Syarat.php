<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'syarat',
    ];

    public function syarat()
    {
        return $this->belongsTo(Admin::class);
    }
}
