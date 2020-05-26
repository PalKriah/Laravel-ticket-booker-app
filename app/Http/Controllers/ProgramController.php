<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Models\Cinema;
use App\Models\Program;
use App\Models\Movie;

class ProgramController extends Controller
{
    public function index(Cinema $cinema)
    {
        return view('content.program.list')->with('cinema', $cinema);
    }

    public function create(Cinema $cinema)
    {
        $movies = Movie::get();
        return view('content.program.create')->with(['cinema' => $cinema, 'movies' => $movies]);
    }

    public function insert(Cinema $cinema, ProgramRequest $request)
    {
        Program::create($request->program);
        return redirect()->route('programs.list', ['cinema' => $cinema])->with('success', __('Program added successfully'));
    }

    public function delete(Cinema $cinema, Program $program)
    {
        $bookings = $program->bookings()->get();
        $program->delete();
        foreach ($bookings as $booking) {
            $booking->delete();
        }
        return redirect()->route('programs.list', ['cinema' => $cinema])->with('success', __('Program deleted successfully'));
    }
}
