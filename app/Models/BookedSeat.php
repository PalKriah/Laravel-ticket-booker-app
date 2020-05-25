<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookedSeat extends Model
{
    protected $fillable = [
        'user_id', 'row',
        'seat', 'program_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
