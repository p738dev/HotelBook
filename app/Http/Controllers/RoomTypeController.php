<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function roomTypeList () {
        $allData = RoomType::orderBy('id', 'desc')->get();
        return view('backend.allRoom.view_roomtype', compact('allData'));
    }

    public function addRoomType () {
        return view('backend.allRoom.add_roomtype');
    }

    public function roomTypeStore(Request $request) {
        $roomtype_id = RoomType::insertGetId([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        Room::insert([
            'roomtype_id' => $roomtype_id,
        ]);

        $notification = [
            'message' => 'Room Type Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('room.type.list')->with($notification);
    }
}