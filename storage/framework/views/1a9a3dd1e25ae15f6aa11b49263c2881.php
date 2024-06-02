<?php $__env->startSection('content'); ?>
<div class="form__create">

<form method="POST" action="<?php echo e(route('store_image')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
       
        <br>
        <?php if($errors->any()): ?>
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="color: red"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
        <div class="form__inputs-edit" >
            <label for="image">Select image
                <input type="file" name="image">
            </label>
            <div class="section__input">
                <label for="description">Image description</label>
                <textarea type="text" name="description"></textarea>
            </div>
            <div class="section__input">
                <label for="textnews">Text News</label>
                <textarea type="text" name="textnews"></textarea>
            </div>
            <div class="section__input">
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" ></textarea>
            </div>
        </div>
        <br>
        <button  class="button__create" type="submit">Upload</button>

    </form>
</div>
    

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/image/create.blade.php ENDPATH**/ ?>