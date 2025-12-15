

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Tambah Pemesanan Baru</h1>
                <a href="<?php echo e(route('bookings.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="<?php echo e(route('bookings.store')); ?>" method="POST" id="bookingForm">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_name" class="form-label fw-bold">Nama Tamu *</label>
                                    <input type="text" class="form-control form-control-lg <?php $__errorArgs = ['guest_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="guest_name" name="guest_name" value="<?php echo e(old('guest_name')); ?>" 
                                           placeholder="Masukkan nama tamu" required>
                                    <?php $__errorArgs = ['guest_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_email" class="form-label fw-bold">Email Tamu</label>
                                    <input type="email" class="form-control form-control-lg <?php $__errorArgs = ['guest_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="guest_email" name="guest_email" value="<?php echo e(old('guest_email')); ?>" 
                                           placeholder="email@example.com">
                                    <?php $__errorArgs = ['guest_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="guest_phone" class="form-label fw-bold">Telepon Tamu</label>
                                    <input type="text" class="form-control form-control-lg <?php $__errorArgs = ['guest_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="guest_phone" name="guest_phone" value="<?php echo e(old('guest_phone')); ?>" 
                                           placeholder="08xxxxxxxxxx">
                                    <?php $__errorArgs = ['guest_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="room_id" class="form-label fw-bold">Kamar *</label>
                                    <select class="form-control form-control-lg <?php $__errorArgs = ['room_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="room_id" name="room_id" required>
                                        <option value="">Pilih Kamar</option>
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($room->id); ?>" 
                                                    data-price="<?php echo e($room->price); ?>"
                                                    <?php echo e(old('room_id') == $room->id ? 'selected' : ''); ?>>
                                                <?php echo e($room->room_number); ?> - <?php echo e(ucfirst($room->room_type)); ?> - Rp <?php echo e(number_format($room->price, 0, ',', '.')); ?>/malam
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['room_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label fw-bold">Check-in *</label>
                                    <input type="date" class="form-control form-control-lg <?php $__errorArgs = ['check_in_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="check_in_date" name="check_in_date" value="<?php echo e(old('check_in_date')); ?>" required>
                                    <?php $__errorArgs = ['check_in_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_out_date" class="form-label fw-bold">Check-out *</label>
                                    <input type="date" class="form-control form-control-lg <?php $__errorArgs = ['check_out_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="check_out_date" name="check_out_date" value="<?php echo e(old('check_out_date')); ?>" required>
                                    <?php $__errorArgs = ['check_out_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    <select class="form-control form-control-lg <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="status" name="status">
                                        <option value="pending" <?php echo e(old('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                        <option value="confirmed" <?php echo e(old('status') == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                        <option value="checked_in" <?php echo e(old('status') == 'checked_in' ? 'selected' : ''); ?>>Checked In</option>
                                        <option value="checked_out" <?php echo e(old('status') == 'checked_out' ? 'selected' : ''); ?>>Checked Out</option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TelUHotel\resources\views/bookings/create.blade.php ENDPATH**/ ?>