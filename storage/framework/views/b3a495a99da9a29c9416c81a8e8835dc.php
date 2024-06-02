<?php $__env->startSection('content'); ?>
<h1 class="autor__posts-profile">News of <span><?php echo e($user->name); ?></span></h1>
<form class="autor__post-search-form" method="GET" action="<?php echo e(route('profile.search', $user->id)); ?>">
    <?php echo csrf_field(); ?>
    <li>
        <input class="autor__post-search-input" type="text" name="search" placeholder="Пошук...">
    </li>
</form>
<?php if(auth()->check()): ?>
    <p class="upload__image-autor"><a href="<?php echo e(route('create_image')); ?>">Upload News</a></p>
<?php endif; ?>
<div class="prifile__post-row" style="display:flex;flex-wrap:wrap;margin:20px; justify-content: center;">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class= "post__block" style="width: 200px;margin:10px">
            <div class="post__block-content">
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
            <div class="manipulation__section">
                <?php if(auth()->id() == $image->user->id): ?>
                <a class="edit__button" href="<?php echo e(route('image.edit', $image->id)); ?>">Edit</a>
                <a class="delete__button"href="<?php echo e(route('image.destroy.confirm', $image->id)); ?>">Delete</a>
                <?php if(session()->has('confirm')): ?>
                    <p style="color: aliceblue; display: flex; gap: 10px; align-items: center;">
                        Are you sure? <a class="delete__button" href="<?php echo e(route('image.destroy', $image->id)); ?>">Yes</a>
                    </p>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="pagination__block">
    <?php echo e($images->links()); ?>       
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\FreshNews\resources\views/auth/profile.blade.php ENDPATH**/ ?>