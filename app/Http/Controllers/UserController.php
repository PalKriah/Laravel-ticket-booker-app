<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookedSeat;

class UserController extends Controller
{
    public function index()
    {
        $tickets = BookedSeat::join('programs', 'program_id', '=', 'programs.id')->where('user_id', Auth::user()->id)->orderBy('programs.date')->get();
        return view('content.user')->with('tickets', $tickets);
    }
}
