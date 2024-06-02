<?php $__env->startSection('content'); ?>
<div class="form__edit">
    <?php if($errors->any()): ?>
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="color: red"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <div class="block-edit__with-image">
    <?php if(strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false): ?>
        <video controls>
            <source src="<?php echo e(url('images/'.$image->name)); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php else: ?>
        <img src="<?php echo e(url('images/'.$image->name)); ?>">
    <?php endif; ?>
    </div>
    <form method="POST" action="<?php echo e(route('image.update', $image->id)); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <div class="form__inputs-edit" >
            <input type="file" name="new_image" id="new_image">
            <input type="hidden" name="image_id" value="<?php echo e($image->id); ?>"> 

            <div class="section__input-edit">
                <label for="description">Image description</label>
                <textarea type="text" name="description"><?php echo e($image->description); ?></textarea>
            </div>
            <div class="section__input-edit">
                <label for="textnews">Text News</label>
                <textarea type="text" name="textnews"><?php echo e($image->textnews); ?></textarea>
            </div>
            <div class="section__input-edit">
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" ><?php $__currentLoopData = $image->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></textarea>
            </div>
            <button type="submit" class="button__upload">Upload</button>
        </div>
        
        
    </form>

   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\NewsSiteFORCOURSE\resources\views/image/edit.blade.php ENDPATH**/ ?>