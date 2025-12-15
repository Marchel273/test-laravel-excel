<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard - TelU Hotel Management System')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Kamar</h5>
                                    <p class="card-text">Kelola data kamar hotel</p>
                                    <a href="<?php echo e(route('rooms.index')); ?>" class="btn btn-light">Kelola Kamar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Pemesanan</h5>
                                    <p class="card-text">Kelola pemesanan kamar</p>
                                    <a href="<?php echo e(route('bookings.index')); ?>" class="btn btn-light">Kelola Pemesanan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan</h5>
                                    <p class="card-text">Lihat dan download laporan</p>
                                    <a href="<?php echo e(route('reports.index')); ?>" class="btn btn-light">Lihat Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Statistik Cepat</div>
                                <div class="card-body">
                                    <?php
                                        $totalRooms = \App\Models\Room::count();
                                        $availableRooms = \App\Models\Room::where('status', 'available')->count();
                                        $totalBookings = \App\Models\Booking::count();
                                    ?>
                                    <p>Total Kamar: <strong><?php echo e($totalRooms); ?></strong></p>
                                    <p>Kamar Tersedia: <strong><?php echo e($availableRooms); ?></strong></p>
                                    <p>Total Pemesanan: <strong><?php echo e($totalBookings); ?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TelUHotel\resources\views/dashboard.blade.php ENDPATH**/ ?>