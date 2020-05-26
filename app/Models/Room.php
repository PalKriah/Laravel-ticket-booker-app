<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'cinema_id', 'number',
    ];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function rows()
    {
        return $this->hasMany(Row::class);
    }

    public function getSeatCountAttribute()
    {
        $count = 0;
        foreach ($this->rows as $row) {
            $count += $row->seat_count;
        }
        return $count;
    }
}
