<?php $__env->startSection('content'); ?>

    <form method="POST" action="<?php echo e(route('store_image')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <label for="image">Select image
            <input type="file" name="image">
        </label>
        <br>
        <div class="grid" style="width:50%">
            <div>
                <label for="description">Image description</label>
                <textarea type="text" name="description" style="max-width: 100%;width:90%"></textarea>
            </div>
            <div>
                <label for="textnews">Tags</label>
                <textarea type="text" name="textnews" style="max-width: 100%;width:90%"></textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" style="max-width: 100%;width:90%"></textarea>
            </div>
        </div>
        <br>
        <button type="submit" style="width: 100px">Upload</button>
    </form>

    <?php if($errors->any()): ?>
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="color: red"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/image/create.blade.php ENDPATH**/ ?>