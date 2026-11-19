<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    protected $fillable = [
        'booking_id',
        'layanan_id',
        'nama_layanan',
        'harga',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}