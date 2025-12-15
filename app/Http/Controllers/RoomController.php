<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type' => 'required|in:suite,deluxe,standard',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,maintenance',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required|in:suite,deluxe,standard',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,maintenance',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}