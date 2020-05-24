<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Occupied implements Rule
{
    protected $room_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($room_id)
    {
        $this->room_id = $room_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $seats = DB::table('booked_seats')->where('row', $value['row'])->where('seat', $value['seat'])->count();
        return $seats <= 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The seat at :attribute already occupied.";
    }
}
