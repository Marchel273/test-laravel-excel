<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('reports.index', compact('bookings'));
    }

    public function export()
    {
        return Excel::download(new BookingsExport, 'bookings.xlsx');
    }
}