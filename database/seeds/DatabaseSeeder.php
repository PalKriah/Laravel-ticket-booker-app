<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenreSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(CinemaSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(RowSeeder::class);
        $this->call(ProgramSeeder::class);
    }
}
