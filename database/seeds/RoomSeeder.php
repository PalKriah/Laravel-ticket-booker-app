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
        $room->seats = 160;
        $room->save();

        $room = new Room();
        $room->cinema_id = 1;
        $room->number = 2;
        $room->seats = 140;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->number = 1;
        $room->seats = 100;
        $room->save();

        $room = new Room();
        $room->cinema_id = 2;
        $room->number = 2;
        $room->seats = 80;
        $room->save();

        $room = new Room();
        $room->cinema_id = 3;
        $room->number = 1;
        $room->seats = 60;
        $room->save();

        $room = new Room();
        $room->cinema_id = 3;
        $room->number = 2;
        $room->seats = 90;
        $room->save();
    }
}
