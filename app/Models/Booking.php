<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'guest_name',
        'guest_email', // tambahkan
        'guest_phone', // tambahkan
        'check_in_date',
        'check_out_date',
        'total_price',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}