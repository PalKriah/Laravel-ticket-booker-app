<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SeatNumber implements Rule
{

    protected $seats;
    protected $room_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($room_id, $seats)
    {
        $this->room_id = $room_id;
        $this->seats = $seats;
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
        $index = (int) substr($attribute, 0, strpos($attribute, "."));
        $seat_max = DB::table('rows')->select('seat_count')->where('room_id', $this->room_id)->where('row_number', $this->seats[$index]['row'])->get();
        return $value <= $seat_max[0]->seat_count;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The seat does not exist in the selected row.';
    }
}
