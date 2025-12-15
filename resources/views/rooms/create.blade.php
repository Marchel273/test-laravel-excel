@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kamar</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="room_number" class="form-label">Nomor Kamar *</label>
                    <input type="text" class="form-control @error('room_number') is-invalid @enderror" 
                           id="room_number" name="room_number" value="{{ old('room_number') }}" required>
                    @error('room_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="room_type" class="form-label">Tipe Kamar *</label>
                    <select class="form-control @error('room_type') is-invalid @enderror" 
                            id="room_type" name="room_type" required>
                        <option value="">Pilih Tipe Kamar</option>
                        <option value="suite" {{ old('room_type') == 'suite' ? 'selected' : '' }}>Suite</option>
                        <option value="deluxe" {{ old('room_type') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                        <option value="standard" {{ old('room_type') == 'standard' ? 'selected' : '' }}>Standard</option>
                    </select>
                    @error('room_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga per Malam *</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" value="{{ old('price') }}" min="0" step="0.01" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status *</label>
                    <select class="form-control @error('status') is-invalid @enderror" 
                            id="status" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Foto Kamar</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                           id="photo" name="photo" accept="image/*">
                    <div class="form-text">Maksimal 2MB. Format: JPEG, PNG, JPG, GIF</div>
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection