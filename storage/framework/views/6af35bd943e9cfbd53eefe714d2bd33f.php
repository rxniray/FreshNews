<?php $__env->startSection('content'); ?>

<?php if(session()->has('confirm')): ?>
    <p>
        Are you sure? <a style="color:red;" href="<?php echo e(route('image.destroy', $image->id)); ?>">yes</a>
    </p>
<?php endif; ?>

<div>
    <img src="<?php echo e(url('images/'.$image->name)); ?>" style="max-width:100%">
</div>
<br>
<div>
    <?php if(auth()->id() == $image->user->id): ?>
    <p>
        <a href="<?php echo e(route('image.edit', $image->id)); ?>"><span style="color: orange">Edit</span></a>
        <a href="<?php echo e(route('image.destroy.confirm', $image->id)); ?>"><span style="color: red">Delete</span></a>
        <?php if(session()->has('confirm')): ?>
            <p>
                Are you sure? <a style="color:red;" href="<?php echo e(route('image.destroy', $image->id)); ?>">yes</a>
            </p>
        <?php endif; ?>
    </p>
    <?php endif; ?>

    <p>
        Uploader: <a href="<?php echo e(route('profile', $image->user->id)); ?>"><?php echo e($image->user->name); ?></a>
    </p>

    <p>Date: <?php echo e($image->created_at); ?></p>

    <p>
        Tags: 
        <?php $__currentLoopData = $image->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('tag', $tag->name)); ?>"><?php echo e($tag->name); ?> </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
    <p><?php echo e($image->description); ?></p>
    <p><?php echo e($image->textnews); ?></p>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/image/show.blade.php ENDPATH**/ ?>