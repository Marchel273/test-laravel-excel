@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard - TelU Hotel Management System') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Kamar</h5>
                                    <p class="card-text">Kelola data kamar hotel</p>
                                    <a href="{{ route('rooms.index') }}" class="btn btn-light">Kelola Kamar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Pemesanan</h5>
                                    <p class="card-text">Kelola pemesanan kamar</p>
                                    <a href="{{ route('bookings.index') }}" class="btn btn-light">Kelola Pemesanan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan</h5>
                                    <p class="card-text">Lihat dan download laporan</p>
                                    <a href="{{ route('reports.index') }}" class="btn btn-light">Lihat Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Statistik Cepat</div>
                                <div class="card-body">
                                    @php
                                        $totalRooms = \App\Models\Room::count();
                                        $availableRooms = \App\Models\Room::where('status', 'available')->count();
                                        $totalBookings = \App\Models\Booking::count();
                                    @endphp
                                    <p>Total Kamar: <strong>{{ $totalRooms }}</strong></p>
                                    <p>Kamar Tersedia: <strong>{{ $availableRooms }}</strong></p>
                                    <p>Total Pemesanan: <strong>{{ $totalBookings }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection