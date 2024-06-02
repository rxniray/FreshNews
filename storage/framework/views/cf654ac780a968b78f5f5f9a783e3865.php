<?php $__env->startSection('content'); ?>
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
            <div style="position: flex">
                <div style="float:left; width:50%">
                    <label for="name" style="margin-bottom:20px">Name:
                    </label>
                    <label for="password">Password:
                    </label>
                </div>
                <div>
                        <input type="text" name="name" style="margin-bottom: 20px;">
                        <input type="password" name="password">
                </div>
            </div>
            <div style="margin-top: 20px">
                <button style="cursor:pointer; width: 200px; margin-left:50px" type="submit">Login</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/auth/login.blade.php ENDPATH**/ ?>