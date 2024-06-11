<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function editRoom ($id) {
        $editData = Room::find($id);
        return view('backend.allRoom.edit_rooms', compact('editData'));
    }
}