@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Manajemen Pemesanan</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pemesanan
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">NO</th>
                            <th>NAMA TAMU</th>
                            <th>KAMAR</th>
                            <th>CHECK-IN</th>
                            <th>CHECK-OUT</th>
                            <th>TOTAL</th>
                            <th>STATUS</th>
                            <th width="100">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $booking->guest_name }}</strong>
                                @if($booking->guest_email)
                                <br><small class="text-muted">{{ $booking->guest_email }}</small>
                                @endif
                                @if($booking->guest_phone)
                                <br><small class="text-muted">{{ $booking->guest_phone }}</small>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $booking->room->room_number }}</strong>
                                <br><small class="text-muted text-uppercase">{{ $booking->room->room_type }}</small>
                            </td>
                            <td>
                                <strong>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</strong>
                            </td>
                            <td>
                                <strong>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</strong>
                            </td>
                            <td>
                                <strong class="text-success">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong>
                            </td>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'confirmed' => 'success',
                                        'checked_in' => 'primary',
                                        'checked_out' => 'secondary'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$booking->status] ?? 'secondary' }}">
                                    {{ strtoupper($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <br>
                                    Belum ada data pemesanan
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection