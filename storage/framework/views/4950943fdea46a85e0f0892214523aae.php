<?php $__env->startSection('content'); ?>

<div style="display:flex;flex-wrap:wrap">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="max-width: 400px;margin:10px">
            <a href="<?php echo e(route('show_image', $image->id)); ?>">
                <img src="<?php echo e(url('images/'.$image->name)); ?>" style="max-width: 200px; max-height: 200px">
            </a>
            <h3> <?php echo e($image->description); ?> </h3>
            <h4> <?php echo e($image->textnews); ?> </h4>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/imageboard/index.blade.php ENDPATH**/ ?>