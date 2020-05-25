<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'description',
        'poster_path'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
