<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookedSeat;
use App\Models\User;
use App\Models\Cinema;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $tickets = BookedSeat::join('programs', 'program_id', '=', 'programs.id')->where('user_id', Auth::user()->id)->orderBy('programs.date')->get();
        return view('content.user.tickets')->with('tickets', $tickets);
    }

    public function ownership()
    {
        $ownerUsers = User::has('cinemas')->get();
        $cinemas = DB::table('cinemas')->select('id', 'name')->get();
        $users = DB::table('users')->select('id', 'email')->get();
        return view('content.user.ownership')->with(['ownerUsers' => $ownerUsers, 'cinemas' => $cinemas, 'users' => $users]);
    }

    public function ownershipInsert(Request $request)
    {
        $request->validate([
            'cinema' => 'required|exists:cinemas,id',
            'user' => 'required|exists:users,id',
        ]);
        $user = User::find($request->user);
        $user->cinemas()->attach($request->cinema);
        return redirect()->route('users.ownership')->with('success', __('Relation added successfully'));
    }

    public function ownershipDelete(User $user, Cinema $cinema)
    {
        $user->cinemas()->detach($cinema->id);
        return redirect()->route('users.ownership')->with('success', __('Relation deleted successfully'));
    }
}
