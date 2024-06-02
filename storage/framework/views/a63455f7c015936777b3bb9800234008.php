<?php $__env->startSection('content'); ?>

<div style="display:flex;flex-wrap:wrap; gap: 15px">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class= "post__block">
        <a href="<?php echo e(route('show_image', $image->id)); ?>">
        <?php if(strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false): ?>
                <video controlsList="nodownload">
                    <source src="<?php echo e(url('images/'.$image->name)); ?>" >
                    Your browser does not support the video tag.
                </video>
                <?php else: ?>
                    <img src="<?php echo e(url('images/'.$image->name)); ?>" >
                <?php endif; ?>
                </a>

            <div class="post__description">
                <div class="post__image-user">

                </div>
                <a href="<?php echo e(route('profile', $image->user->id)); ?>">
                    <img class="image-user__post" src="<?php echo e(asset('avatars/' . (file_exists(public_path('avatars/' . $image->user->avatar)) ? $image->user->avatar : 'default-avatar.png'))); ?>" 
                        alt="User Avatar" 
                        style="width: 40px; height: 40px; border-radius: 50%;">
                </a>
                <div class="post__decription-text">
                    <h3><a href="<?php echo e(route('show_image', $image->id)); ?>">  <?php echo e(Str::limit($image->description, 40)); ?></a></h3>
                    <p><a href="<?php echo e(route('show_image', $image->id)); ?>"> <?php echo e(Str::limit($image->textnews, 50)); ?></a></p>
                </div>
            </div>
            
        </div>
       
            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="pagination__block">
    <?php echo e($images->links()); ?>       
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/imageboard/index.blade.php ENDPATH**/ ?>