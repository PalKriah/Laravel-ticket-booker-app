<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'movie_id', 'room_id', 'cinema_id',
        'date'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
