

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Manajemen Pemesanan</h1>
        <a href="<?php echo e(route('bookings.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pemesanan
        </a>
    </div>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

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
                        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td>
                                <strong><?php echo e($booking->guest_name); ?></strong>
                                <?php if($booking->guest_email): ?>
                                <br><small class="text-muted"><?php echo e($booking->guest_email); ?></small>
                                <?php endif; ?>
                                <?php if($booking->guest_phone): ?>
                                <br><small class="text-muted"><?php echo e($booking->guest_phone); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?php echo e($booking->room->room_number); ?></strong>
                                <br><small class="text-muted text-uppercase"><?php echo e($booking->room->room_type); ?></small>
                            </td>
                            <td>
                                <strong><?php echo e(\Carbon\Carbon::parse($booking->check_in_date)->format('d M Y')); ?></strong>
                            </td>
                            <td>
                                <strong><?php echo e(\Carbon\Carbon::parse($booking->check_out_date)->format('d M Y')); ?></strong>
                            </td>
                            <td>
                                <strong class="text-success">Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></strong>
                            </td>
                            <td>
                                <?php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'confirmed' => 'success',
                                        'checked_in' => 'primary',
                                        'checked_out' => 'secondary'
                                    ];
                                ?>
                                <span class="badge bg-<?php echo e($statusColors[$booking->status] ?? 'secondary'); ?>">
                                    <?php echo e(strtoupper($booking->status)); ?>

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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <br>
                                    Belum ada data pemesanan
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TelUHotel\resources\views/bookings/index.blade.php ENDPATH**/ ?>