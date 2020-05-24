<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Rules\Occupied;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Rules\SeatNumber;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Program $program)
    {
        return view('content.book')->with(['program' => $program]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'program' => 'required|exists:programs,id',
            'selected' => 'required|json',
        ]);
        $program = DB::table('programs')->find($request->program);
        $seats = json_decode($request->selected, true);
        Validator::make($seats, [
            '*.row' => [
                'required',
                Rule::exists('rows', 'row_number')->where('room_id', $program->room_id)
            ],
            '*.seat' => [
                'required',
                new SeatNumber($program->room_id, $seats)
            ],
            '*' =>
            new Occupied($program->room_id)
        ])->validate();

        foreach ($seats as $key => $value) {
            DB::table('booked_seats')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'row' => $value['row'],
                    'seat' => $value['seat'],
                    'program_id' => $program->id
                ]);
        }

        return redirect('user')->with('message', 'Ticket succesfully booked.');
    }
}
