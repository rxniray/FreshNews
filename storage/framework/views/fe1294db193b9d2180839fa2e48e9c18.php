<?php $__env->startSection('content'); ?>
    <h1 style="text-align: center">Images of <?php echo e($user->name); ?></h1>
    <div style="display:flex;flex-wrap:wrap;margin:20px">
        <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="max-width: 400px;margin:10px">
                <a href="<?php echo e(route('show_image', $image->id)); ?>">
                    <img src="<?php echo e(url('images/'.$image->name)); ?>" style="max-width: 200px; max-height: 200px">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/auth/profile.blade.php ENDPATH**/ ?>