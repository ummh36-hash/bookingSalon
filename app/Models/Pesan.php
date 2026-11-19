<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'kategori',
        'deskripsi',
        'balasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}