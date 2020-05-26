<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Cinema;
use App\Models\Room;
use App\Models\Row;

class RoomController extends Controller
{
    public function create(Cinema $cinema)
    {
        return view('content.room-create')->with('cinema', $cinema);
    }

    public function insert(Cinema $cinema, RoomRequest $request)
    {
        $room = new Room();
        $room->cinema_id = $cinema->id;
        $room->number = $request->room['number'];
        $room->save();
        
        for ($i=1; $i <= count($request->rows); $i++) { 
            $row = new Row();
            $row->room_id = $room->id;
            $row->row_number = $i;
            $row->seat_count = $request->rows[$i-1];
            $row->save();
        }
        return redirect()->route('programs.list', ['cinema' => $cinema]);
    }

    public function delete(Cinema $cinema, Room $room)
    {
        $room->delete();
        return redirect()->route('programs.list', ['cinema' => $cinema]);
    }
}
