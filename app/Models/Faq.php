<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'tanggal',
        'pertanyaan',
        'jawaban',
    ];

    public function faq() {
        return $this->belongsTo(Admin::class);
    }
}
