<?php $__env->startSection('content'); ?>
<div class="regist__container">
<h1 style="text-align: center">Registration</h1>
    <?php if($errors->any()): ?>
    <div style="text-align: center">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p style="color:red;"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div style="display: flex; justify-content: center;">
        <form method="POST" action="<?php echo e(route('registration.store')); ?>" class="form__registration">
            <?php echo csrf_field(); ?>
            <div style="display: flex; flex-direction: column;" >
                <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" style="margin: 5px 0 20px 0;">
                </div>
                <div>
                        <label for="password" >Password:</label>
                        <input type="password" name="password" style="margin: 5px 0 20px 0;">
                </div>
                <div>
                        <label for="password_confirmation">Confirm password:</label>
                        <input type="password" name="password_confirmation" style="margin: 5px 0 20px 0;">
                </div>
            </div>
            <div style="display: flex; flex-direction: row; justify-content: end;">
                <button style="cursor:pointer; width: 200px;" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/auth/registration.blade.php ENDPATH**/ ?>