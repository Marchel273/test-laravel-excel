<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Booking::with('room')->get()->map(function($booking) {
            return [
                'id' => $booking->id,
                'room_number' => $booking->room->room_number,
                'room_type' => $booking->room->room_type,
                'guest_name' => $booking->guest_name,
                'check_in_date' => $booking->check_in_date,
                'check_out_date' => $booking->check_out_date,
                'total_price' => $booking->total_price,
                'status' => $booking->status,
                'created_at' => $booking->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nomor Kamar',
            'Tipe Kamar',
            'Nama Tamu',
            'Check In',
            'Check Out',
            'Total Harga',
            'Status',
            'Tanggal Dibuat'
        ];
    }
}   