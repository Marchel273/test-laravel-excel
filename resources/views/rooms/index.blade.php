@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Kamar</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Tambah Kamar</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ ucfirst($room->room_type) }}</td>
                        <td>Rp {{ number_format($room->price, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $room->status == 'available' ? 'success' : ($room->status == 'occupied' ? 'warning' : 'danger') }}">
                                {{ ucfirst($room->status) }}
                            </span>
                        </td>
                        <td>
                            @if($room->photo)
                                <img src="{{ Storage::url($room->photo) }}" alt="Room Photo" width="50">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection