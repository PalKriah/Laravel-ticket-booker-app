<?php

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = new Movie();
        $movie->name = "Mulan";
        $movie->description = "When the Emperor of China issues a decree that one man per family must serve in the Imperial Chinese Army to defend the country from Huns, Hua Mulan, the eldest daughter of an honored warrior, steps in to take the place of her ailing father. She is spirited, determined and quick on her feet. Disguised as a man by the name of Hua Jun, she is tested every step of the way and must harness her innermost strength and embrace her true potential.";
        $movie->poster_path = "storage/posters/mulan.jpg";
        $movie->save();
        $movie->genres()->attach(['1', '4']);

        $movie = new Movie();
        $movie->name = "TENET";
        $movie->description = "An action epic revolving around international espionage, time travel, and evolution. Possibly about a man trying to prevent World War 3 through time travel and rebirth.";
        $movie->poster_path = "storage/posters/tenet.jpg";
        $movie->save();
        $movie->genres()->attach(['1', '4']);

        $movie = new Movie();
        $movie->name = "Black Widow";
        $movie->description = "A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.
        At birth the Black Widow \"aka Natasha Romanova\" is given to the KGB, which grooms her to become its ultimate operative. When the U.S.S.R. breaks up, the government tries to kill her as the action moves to present-day New York, where she is a freelance operative.";
        $movie->poster_path = "storage/posters/black_widow.jpg";
        $movie->save();
        $movie->genres()->attach(['1', '2', '6']);

        $movie = new Movie();
        $movie->name = "Avengers: Endgame";
        $movie->description = "After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos' actions and restore order to the universe once and for all, no matter what consequences may be in store";
        $movie->poster_path = "storage/posters/avengers_endgame.jpg";
        $movie->save();
        $movie->genres()->attach(['1', '2', '6']);
    }
}