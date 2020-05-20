<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = DB::table('programs')
            ->select('movies.*')
            ->join('movies', 'movies.id', '=', 'programs.movie_id')
            ->where('date', '>', date("Y-m-d h:i:sa"))
            ->distinct()
            ->get();

        return view('content.movie-list')->with('movies', $movies);
    }

    public function show(Movie $movie)
    {
        return view('content.movie-item')->with('movie', $movie);
    }

    public function post(Request $req)
    {
        $img = $req->file('file');
        $resize = Image::make($img)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        Storage::disk('public')->put('posters/black_widow.jpg', $resize);
    }
}
