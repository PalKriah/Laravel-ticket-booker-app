<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use Symfony\Component\HttpFoundation\Response;

class CinemaController extends Controller
{
    public function movie(Movie $movie)
    {
        $cinemas = DB::table('programs')
            ->select('cinemas.*')
            ->join('cinemas', 'cinemas.id', '=', 'programs.cinema_id')
            ->where('movie_id', '=', $movie->id)
            ->where('date', '>', date("Y-m-d h:i:sa"))
            ->distinct()
            ->get();

        return view('content.cinemas-movie')->with('cinemas', $cinemas);
    }

    public function index(Movie $movie)
    {
        $countries = DB::table('cinemas')->select('country')->distinct()->orderBy('country')->get();
        $cities = DB::table('cinemas')->select('city')->distinct()->orderBy('city')->get();
        $movies = DB::table('programs')
            ->select(['movies.id', 'movies.name'])
            ->join('movies', 'movies.id', '=', 'programs.movie_id')
            ->where('date', '>', date("Y-m-d h:i:sa"))
            ->distinct()
            ->get();
        return view('content.cinema-list')->with(['countries' => $countries, 'cities' => $cities, 'movies' => $movies, 'movie' => $movie]);
    }

    public function search(Request $request)
    {
        $output = '';
        $country = $request->get('country');
        $city = $request->get('city');
        $movie = $request->get('movie');
        if ($country != '' || $city != '') {

            $cinemas = DB::table('cinemas')
                ->where('country', 'like', '%' . $country . '%')
                ->where('city', 'like', '%' . $city . '%');
        } else {
            $cinemas = DB::table('cinemas');
        }
        if ($movie) {
            $cinemas = $cinemas->whereIn('id', function ($query) use ($movie) {
                $query->select('cinema_id')->from('programs')->where('movie_id', $movie);
            });
        }
        $cinemas = $cinemas->get();

        if ($cinemas->count() > 0) {
            foreach ($cinemas as $cinema) {
                $output .= '
                    <div class="row mt-4 justify-content-center text-center">
                        <h6 class="col-md-3 col-10 border border-white p-2">' . $cinema->name . '</h6>
                        <h6 class="col-md-3 col-10 border border-white p-2">' . $cinema->country . '</h6>
                        <h6 class="col-md-3 col-10 border border-white p-2">' . $cinema->city . ', ' . $cinema->location . '</h6>
                    </div>
                    <div class="row justify-content-center">
                        <a href="" class="btn btn-primary col-md-2 col-6">View
                            schedule</a>
                    </div>
                        ';
            }
        } else {
            $output = '<h4 align="center">No Cinema Found</h4>';
        }
        $data = array(
            'data'  => $output,
            'dummy' => 'something'
        );

        echo json_encode($data);
    }
}



// <div class="row mt-4 justify-content-center text-center">
//     <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->name }}</h6>
//     <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->country }}</h6>
//     <h6 class="col-md-3 col-10 border border-white p-2">{{ $cinema->city }}, {{$cinema->location}}</h6>
// </div>
// <div class="row justify-content-center">
//     <a href="{{ route('cinema.schedule', 'cinema'=>$cinema->id) }}" class="btn btn-primary col-md-2 col-6">View
//         schedule</a>
// </div>
