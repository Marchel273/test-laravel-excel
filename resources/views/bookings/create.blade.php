@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Tambah Pemesanan Baru</h1>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_name" class="form-label fw-bold">Nama Tamu *</label>
                                    <input type="text" class="form-control form-control-lg @error('guest_name') is-invalid @enderror" 
                                           id="guest_name" name="guest_name" value="{{ old('guest_name') }}" 
                                           placeholder="Masukkan nama tamu" required>
                                    @error('guest_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_email" class="form-label fw-bold">Email Tamu</label>
                                    <input type="email" class="form-control form-control-lg @error('guest_email') is-invalid @enderror" 
                                           id="guest_email" name="guest_email" value="{{ old('guest_email') }}" 
                                           placeholder="email@example.com">
                                    @error('guest_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_phone" class="form-label fw-bold">Telepon Tamu</label>
                                    <input type="text" class="form-control form-control-lg @error('guest_phone') is-invalid @enderror" 
                                           id="guest_phone" name="guest_phone" value="{{ old('guest_phone') }}" 
                                           placeholder="08xxxxxxxxxx">
                                    @error('guest_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="room_id" class="form-label fw-bold">Kamar *</label>
                                    <select class="form-control form-control-lg @error('room_id') is-invalid @enderror" 
                                            id="room_id" name="room_id" required>
                                        <option value="">Pilih Kamar</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}" 
                                                    data-price="{{ $room->price }}"
                                                    {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                {{ $room->room_number }} - {{ ucfirst($room->room_type) }} - Rp {{ number_format($room->price, 0, ',', '.') }}/malam
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label fw-bold">Check-in *</label>
                                    <input type="date" class="form-control form-control-lg @error('check_in_date') is-invalid @enderror" 
                                           id="check_in_date" name="check_in_date" value="{{ old('check_in_date') }}" required>
                                    @error('check_in_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_out_date" class="form-label fw-bold">Check-out *</label>
                                    <input type="date" class="form-control form-control-lg @error('check_out_date') is-invalid @enderror" 
                                           id="check_out_date" name="check_out_date" value="{{ old('check_out_date') }}" required>
                                    @error('check_out_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Total Amount</label>
                                    <div class="form-control form-control-lg bg-light fw-bold text-success" id="total_price_display">
                                        Rp 0
                                    </div>
                                    <input type="hidden" id="total_price" name="total_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-bold">Status</label>
                                    <select class="form-control form-control-lg @error('status') is-invalid @enderror" 
                                            id="status" name="status">
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="checked_in" {{ old('status') == 'checked_in' ? 'selected' : '' }}>Checked In</option>
                                        <option value="checked_out" {{ old('status') == 'checked_out' ? 'selected' : '' }}>Checked Out</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="reset" class="btn btn-outline-secondary btn-lg me-md-2">
                                <i class="fas fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Simpan Pemesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
}
.card {
    border: none;
    border-radius: 15px;
}
.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roomSelect = document.getElementById('room_id');
    const checkInDate = document.getElementById('check_in_date');
    const checkOutDate = document.getElementById('check_out_date');
    const totalPriceDisplay = document.getElementById('total_price_display');
    const totalPriceInput = document.getElementById('total_price');

    // Set minimum date untuk check-in (hari ini)
    const today = new Date().toISOString().split('T')[0];
    checkInDate.min = today;
    checkOutDate.min = today;

    function calculateTotalPrice() {
        const selectedOption = roomSelect.options[roomSelect.selectedIndex];
        const pricePerNight = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) : 0;
        const checkIn = new Date(checkInDate.value);
        const checkOut = new Date(checkOutDate.value);
        
        if (pricePerNight > 0 && checkIn && checkOut && checkOut > checkIn) {
            const timeDiff = checkOut.getTime() - checkIn.getTime();
            const nights = timeDiff / (1000 * 3600 * 24);
            const total = pricePerNight * nights;
            
            totalPriceDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
            totalPriceInput.value = total;
        } else {
            totalPriceDisplay.textContent = 'Rp 0';
            totalPriceInput.value = '';
        }
    }

    // Update min date untuk check-out berdasarkan check-in
    checkInDate.addEventListener('change', function() {
        if (this.value) {
            checkOutDate.min = this.value;
            if (checkOutDate.value && checkOutDate.value < this.value) {
                checkOutDate.value = '';
            }
        }
        calculateTotalPrice();
    });

    roomSelect.addEventListener('change', calculateTotalPrice);
    checkOutDate.addEventListener('change', calculateTotalPrice);
});
</script>
@endsection