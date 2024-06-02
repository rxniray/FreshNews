<?php $__env->startSection('content'); ?>
<div class="regist__container">
<h1 style="text-align: center">Login</h1>
    
    <?php if($errors->any()): ?>
        <div style="text-align: center">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="color:red;"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php elseif(session()->has('message')): ?>
        <div style="text-align: center">
            <p style="color:red;"><?php echo e(session()->get('message')); ?></p>
        </div>
    <?php endif; ?>

    <div style="display: flex; justify-content: center;">
        <form method="POST" action="<?php echo e(route('auth.login.post')); ?>">
            <?php echo csrf_field(); ?>
            <div style="display: flex">
                <div style="">
                    <label for="name" style="margin-bottom:20px">Name:</label>
                    <input type="text" name="name" style="margin-bottom: 20px;">
                    <label for="password">Password:</label>
                    <input type="password" name="password">
                </div>
            </div>
            <div style="margin-top: 20px; display: flex; flex-direction: row; justify-content: end;">
                <button style="cursor:pointer; width: 200px" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\FreshNews\resources\views/auth/login.blade.php ENDPATH**/ ?>