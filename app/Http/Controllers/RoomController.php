<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $rooms = Room::paginate(4);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create() {
        return view('admin.rooms.create');
    }

    public function store() {
        $rooms = $this->validateRequest();
        Room::create($rooms);

        session()->flash('success','The Room was Created');
        return redirect('/rooms');
    }

    public function edit(Room $room) {
        return view('admin.rooms.edit', ['room' => $room]);
    }

    public function update(Room $room) {
        $data = $this->validateRequest();

        $room->update($data);

        session()->flash('success','The room was Updated');
        return redirect('/rooms');
    }

    public function delete(Room $room) {
        $room->delete();

        session()->flash('success','The room was Deleted');
        return redirect('/rooms');
    }

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3|unique:rooms,name'
        ]);
    }
}
