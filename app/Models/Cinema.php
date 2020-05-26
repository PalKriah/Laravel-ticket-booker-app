<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $fillable = [
        'name', 'country',
        'city', 'location'
    ];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
