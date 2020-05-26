<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\Cinema;
use App\Http\Requests\CinemaRequest;
use App\Models\BookedSeat;
use App\Models\Program;
use DateTime;

class CinemaController extends Controller
{
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
            $output = view('request-content.cinema-search')->with('cinemas', $cinemas)->render();
        } else {
            $output = '<h4 align="center">No Cinema Found</h4>';
        }
        $data = array(
            'data'  => $output,
            'dummy' => 'something'
        );

        echo json_encode($data);
    }

    public function show(Cinema $cinema)
    {
        $dates = DB::table('programs')
            ->select('date')
            ->where('cinema_id', '=', $cinema->id)
            ->where('date', '>', date("Y-m-d h:i:sa"))
            ->distinct()
            ->get();

        $date = new DateTime();
        $out = array();
        $year = date_format($date, "Y");
        $month = date_format($date, "n");
        $monthName = date_format($date, "F");
        $monthDays = array();

        for ($i = 0; $i < 31; $i++) {
            $added = false;
            if (date_format($date, "n") != $month) {
                array_push($out, ["year" => $year, "month" => $month, "month_name" => $monthName, "date" => $monthDays]);
                $year = date_format($date, "Y");
                $month = date_format($date, "n");
                $monthName = date_format($date, "F");
                $monthDays = array();
            }

            foreach ($dates as $moviedate) {
                if (date_format(new DateTime($moviedate->date), 'Y-m-d') == date_format($date, 'Y-m-d')) {
                    array_push($monthDays, ["number" => date_format($date, "d"), "active" => true]);
                    $added = true;
                    break;
                }
            }

            if (!$added) {
                array_push($monthDays, ["number" => date_format($date, "d"), "active" => false]);
            }
            $date->modify('+1 day');
        }
        array_push($out, ["year" => $year, "month" => $month, "month_name" => $monthName, "date" => $monthDays]);

        return view('content.cinema-schedule')->with(['cinema' => $cinema, 'dates' => $out]);
    }

    public function schedule(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');
        $day = $request->get('day');
        $cinema = $request->get('cinema');

        $date = new DateTime($year . '-' . $month . '-' . $day);

        $programs = DB::table('programs')
            ->select('programs.id', 'movies.name', 'date')
            ->join('movies', 'movies.id', '=', 'programs.movie_id')
            ->where('cinema_id', '=', $cinema)
            ->whereDate('date', $date)
            ->orderBy('movies.name')
            ->orderBy('date')
            ->get();
        $data = '';
        foreach ($programs as $key => $value) {
            $date = new DateTime($value->date);
            $programs[$key]->date = $date->format('H:i');
        }
        if ($programs->count() > 0) {
            $data = view('request-content.cinema-day')->with(['programs' => $programs, 'date' => date_format($date, 'Y-m-d')])->render();
        } else {
            $data = '<h4 align="center">No Program Found</h4>';
        }

        echo json_encode($data);
    }

    public function create()
    {
        return view('content.cinema-create');
    }

    public function insert(CinemaRequest $request)
    {
        $cinema = Cinema::create($request->cinema);

        return redirect()->route('cinemas.show', ['cinema' => $cinema]);
    }

    public function edit(Cinema $cinema)
    {
        return view('content.cinema-edit')->with('cinema', $cinema);
    }

    public function update(Cinema $cinema, CinemaRequest $request)
    {
        $cinema->update($request->cinema);

        return redirect()->route('cinemas.show', ['cinema' => $cinema]);
    }

    public function delete(Cinema $cinema)
    {
        $cinema->delete();

        return redirect()->route('cinemas.index');
    }
}
