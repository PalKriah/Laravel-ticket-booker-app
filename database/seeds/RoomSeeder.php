<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room();
        $room->cinema_id = 1;
        $room->number = 1;
        $room->save();

        $room = new Room();
        $room->cinema_id = 1;
        $room->number = 2;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->number = 1;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->number = 2;
        $room->save();

        $room = new Room();
        $room->cinema_id = 3;
        $room->number = 1;
        $room->save();

        $room = new Room();
        $room->cinema_id = 3;
        $room->number = 2;
        $room->save();
    }
}
