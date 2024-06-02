<?php $__env->startSection('content'); ?>
    <h1 style="text-align: center">Registration</h1>
    <?php if($errors->any()): ?>
    <div style="text-align: center">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p style="color:red;"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div style="display: flex; justify-content: center;">
        <form method="POST" action="<?php echo e(route('registration.store')); ?>">
            <?php echo csrf_field(); ?>

            <!--
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
            -->

            <div style="position: flex">
                <div>
                        <label for="name" style="margin-bottom:20px">Name</label>
                        <input type="text" name="name" style="margin-bottom: 20px;">
                </div>
                <div>
                        <label for="password" style="margin-bottom:20px">Password</label>
                        <input type="password" name="password" style="margin-bottom:20px">
                </div>
                <div>
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" name="password_confirmation">
                </div>
            </div>
            <div style="margin-top: 20px">
                <button style="cursor:pointer; width: 200px;" type="submit">Register</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/auth/registration.blade.php ENDPATH**/ ?>