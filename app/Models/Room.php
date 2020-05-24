<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'cinema_id', 'number', 'seats'
    ];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function rows()
    {
        return $this->hasMany(Row::class);
    }
}
