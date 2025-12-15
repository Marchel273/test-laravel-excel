<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request) {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'nullable|email|max:255',
            'guest_phone' => 'nullable|string|max:20',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:pending,confirmed,checked_in,checked_out'
        ]);

        $room = Room::find($request->room_id);
        $days = (strtotime($request->check_out_date) - strtotime($request->check_in_date)) / (60 * 60 * 24);
        $total_price = $room->price * $days;

        Booking::create([
            'room_id' => $request->room_id,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $total_price,
            'status' => $request->status
        ]);

        // Update room status to occupied jika status bukan pending
        if ($request->status != 'pending') {
            $room->update(['status' => 'occupied']);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
}