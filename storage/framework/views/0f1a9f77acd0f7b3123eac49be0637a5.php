<?php $__env->startSection('content'); ?>
<div class="form__show">
    <div class="show__block">
<div class="block__with-image">
<?php if(strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false): ?>
        <video controls>
            <source src="<?php echo e(url('images/'.$image->name)); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php else: ?>
        <img src="<?php echo e(url('images/'.$image->name)); ?>">
    <?php endif; ?>
</div>
<br>
<div>
    <?php if(auth()->id() == $image->user->id): ?>
    <div class="manipulation__section">
        <a class="edit__button" href="<?php echo e(route('image.edit', $image->id)); ?>">Edit</a>
        <a class="delete__button"href="<?php echo e(route('image.destroy.confirm', $image->id)); ?>">Delete</a>
        <?php if(session()->has('confirm')): ?>
            <p style="color: aliceblue; display: flex; gap: 10px; align-items: center;">
                Are you sure? <a class="delete__button" href="<?php echo e(route('image.destroy', $image->id)); ?>">Yes</a>
            </p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <p class="description__text"><?php echo e($image->description); ?></p>
    <p class="tags__news">
        Tags: 
        <?php $__currentLoopData = $image->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('tag', $tag->name)); ?>"><?php echo e($tag->name); ?> </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
    <p class="main__news-text"><?php echo nl2br($image->textnews); ?></p>
    <p class="autor__publication">
        Uploader: <a href="<?php echo e(route('profile', $image->user->id)); ?>"><?php echo e($image->user->name); ?></a>
    </p>
    <p class="date__news">Date: <?php echo e($image->created_at); ?></p>
</div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\FreshNews\resources\views/image/show.blade.php ENDPATH**/ ?>