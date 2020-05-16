<?php

use Illuminate\Database\Seeder;
use App\Models\Row;

class RowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 16; $i++) {
            $row = new Row();
            $row->room_id = 1;
            $row->row_number = $i;
            $row->seat_count = 10;
            $row->save();
        }

        for ($i = 0; $i < 14; $i++) {
            $row = new Row();
            $row->room_id = 2;
            $row->row_number = $i;
            $row->seat_count = 10;
            $row->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $row = new Row();
            $row->room_id = 3;
            $row->row_number = $i;
            $row->seat_count = 10;
            $row->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $row = new Row();
            $row->room_id = 4;
            $row->row_number = $i;
            $row->seat_count = 8;
            $row->save();
        }

        for ($i = 0, $j = 8; $i < 5; $i++, $j += 2) {
            $row = new Row();
            $row->room_id = 5;
            $row->row_number = $i;
            $row->seat_count = $j;
            $row->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $row = new Row();
            $row->room_id = 6;
            $row->row_number = $i;
            $row->seat_count = 9;
            $row->save();
        }
    }
}
