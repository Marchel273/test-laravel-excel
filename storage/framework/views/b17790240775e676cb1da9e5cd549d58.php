

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Manajemen Kamar</h1>
    <a href="<?php echo e(route('rooms.create')); ?>" class="btn btn-primary mb-3">Tambah Kamar</a>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

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
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($room->room_number); ?></td>
                        <td><?php echo e(ucfirst($room->room_type)); ?></td>
                        <td>Rp <?php echo e(number_format($room->price, 0, ',', '.')); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e($room->status == 'available' ? 'success' : ($room->status == 'occupied' ? 'warning' : 'danger')); ?>">
                                <?php echo e(ucfirst($room->status)); ?>

                            </span>
                        </td>
                        <td>
                            <?php if($room->photo): ?>
                                <img src="<?php echo e(Storage::url($room->photo)); ?>" alt="Room Photo" width="50">
                            <?php else: ?>
                                No Photo
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('rooms.edit', $room->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('rooms.destroy', $room->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TelUHotel\resources\views/rooms/index.blade.php ENDPATH**/ ?>