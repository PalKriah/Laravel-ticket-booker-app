<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->isAdmin) {
            $movies = Movie::get();
        } else {
            $movies = Movie::whereHas('programs', function ($query) {
                $query->where('date', '>', date("Y-m-d h:i:sa"));
            })->get();
        }

        return view('content.movie.list')->with('movies', $movies);
    }

    public function show(Movie $movie)
    {
        return view('content.movie.item')->with('movie', $movie);
    }

    public function create()
    {
        $genres = DB::table('genres')->get();
        return view('content.movie.create')->with(['genres' => $genres]);
    }

    public function insert(MovieRequest $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $movie = new Movie();
        $movie->name = $request->movie['name'];
        $movie->description = $request->movie['description'];
        $movie->name = $request->movie['name'];

        $img = $request->file('file');
        $resize = Image::make($img)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');
        $path = 'posters/' . str_replace(' ', '_', $movie->name) . '.jpg';
        Storage::disk('public')->put($path, $resize);
        $movie->poster_path = 'storage/' . $path;
        $movie->save();
        foreach ($request->genres as $reqGenre) {
            $movie->genres()->attach($reqGenre);
        }

        return redirect()->route('movies.show', ['movie' => $movie])->with('success', __('Movie added successfully'));
    }

    public function edit(Movie $movie)
    {
        $genres = DB::table('genres')->get();
        return view('content.movie.edit')->with(['movie' => $movie, 'genres' => $genres]);
    }

    public function update(Movie $movie, MovieRequest $request)
    {
        $movie->name = $request->movie['name'];
        $movie->description = $request->movie['description'];
        $movie->name = $request->movie['name'];
        foreach ($request->genres as $reqGenre) {
            $found = false;
            foreach ($movie->genres as $movieGenre) {
                if ($movieGenre->id == $reqGenre) {
                    $found = true;
                }
            }
            if (!$found) {
                $movie->genres()->attach($reqGenre);
            }
        }

        foreach ($movie->genres as $movieGenre) {
            $found = false;
            foreach ($request->genres as $reqGenre) {
                if ($movieGenre->id == $reqGenre) {
                    $found = true;
                }
            }
            if (!$found) {
                $movie->genres()->detach($movieGenre->id);
            }
        }

        if ($request->file('file') != null) {
            $img = $request->file('file');
            $resize = Image::make($img)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            $path = 'posters/' . str_replace(' ', '_', $movie->name) . '.jpg';
            Storage::disk('public')->delete(substr($movie->poster_path, strpos($movie->poster_path, "/") + 1));
            Storage::disk('public')->put($path, $resize);
            $movie->poster_path = 'storage/' . $path;
        }
        $movie->save();

        return redirect()->route('movies.show', ['movie' => $movie])->with('success', __('Movie updated successfully'));
    }

    public function delete(Movie $movie)
    {
        Storage::disk('public')->delete(substr($movie->poster_path, strpos($movie->poster_path, "/") + 1));
        $movie->delete();
        return redirect()->route('movies.index')->with('success', __('Movie deleted successfully'));
    }
}
