<?php

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $program = new Program();
        $program->movie_id = 1;
        $program->room_id = 1;
        $program->cinema_id = 1;
        $program->date = DateTime::createFromFormat('Y-m-d H:i:s', '2020-04-20 15:30:00');
        $program->save();

        $program = new Program();
        $program->movie_id = 1;
        $program->room_id = 2;
        $program->cinema_id = 1;
        $program->date = DateTime::createFromFormat('Y-m-d H:i:s', '2020-04-20 17:30:00');
        $program->save();

        $program = new Program();
        $program->movie_id = 3;
        $program->room_id = 1;
        $program->cinema_id = 2;
        $program->date = DateTime::createFromFormat('Y-m-d H:i:s', '2020-04-20 18:30:00');
        $program->save();

        $program = new Program();
        $program->movie_id = 2;
        $program->room_id = 2;
        $program->cinema_id = 2;
        $program->date = DateTime::createFromFormat('Y-m-d H:i:s', '2020-04-20 10:30:00');
        $program->save();
    }
}
