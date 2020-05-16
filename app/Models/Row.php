<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $fillable = [
        'room_id', 'row_number', 'seat_count'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}