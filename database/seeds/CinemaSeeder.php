<?php

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinema = new Cinema();
        $cinema->name = 'Cinema City';
        $cinema->country = 'Hungary';
        $cinema->city = 'Miskolc';
        $cinema->location = 'Szentpáli utca 2-4.';
        $cinema->save();

        $cinema = new Cinema();
        $cinema->name = 'Cinema City';
        $cinema->country = 'Hungary';
        $cinema->city = 'Székesfehérvár';
        $cinema->location = 'Palotai út 1.';
        $cinema->save();

        $cinema = new Cinema();
        $cinema->name = 'Cinema Agria';
        $cinema->country = 'Hungary';
        $cinema->city = 'Eger';
        $cinema->location = 'Törvényház út 4.';
        $cinema->save();
    }
}
