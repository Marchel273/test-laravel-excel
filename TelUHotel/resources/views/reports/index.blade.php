@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Pemesanan</h1>
    <a href="{{ route('reports.export') }}" class="btn btn-success mb-3">Download Excel</a>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Nama Tamu</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->room->room_number }}</td>
                        <td>{{ ucfirst($booking->room->room_type) }}</td>
                        <td>{{ $booking->guest_name }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection