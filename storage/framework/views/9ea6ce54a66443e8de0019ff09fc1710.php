

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Laporan Pemesanan</h1>
    <a href="<?php echo e(route('reports.export')); ?>" class="btn btn-success mb-3">Download Excel</a>

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
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($booking->id); ?></td>
                        <td><?php echo e($booking->room->room_number); ?></td>
                        <td><?php echo e(ucfirst($booking->room->room_type)); ?></td>
                        <td><?php echo e($booking->guest_name); ?></td>
                        <td><?php echo e($booking->check_in_date); ?></td>
                        <td><?php echo e($booking->check_out_date); ?></td>
                        <td>Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></td>
                        <td><?php echo e(ucfirst($booking->status)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TelUHotel\resources\views/reports/index.blade.php ENDPATH**/ ?>