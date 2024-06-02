<?php $__env->startSection('content'); ?>

<div style="display:flex;flex-wrap:wrap; gap: 15px">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class= "post__block">
        <a href="<?php echo e(route('show_image', $image->id)); ?>">
        <?php if(strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false): ?>
                <video controlsList="nodownload">
                    <source src="<?php echo e(url('images/'.$image->name)); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <?php else: ?>
                    <img src="<?php echo e(url('images/'.$image->name)); ?>" >
                <?php endif; ?>
                </a>
            <h3><a href="<?php echo e(route('show_image', $image->id)); ?>">  <?php echo e(Str::limit($image->description, 40)); ?></a></h3>
            <p><a href="<?php echo e(route('show_image', $image->id)); ?>"> <?php echo e(Str::limit($image->textnews, 50)); ?></a></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="pagination__block">
    <?php echo e($images->links()); ?>       
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\FreshNews\resources\views/imageboard/index.blade.php ENDPATH**/ ?>