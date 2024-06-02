<?php $__env->startSection('content'); ?>
       
    <div class="user__edit-block">
        <div class="user__container">
            <div class="center-user__block">
                <h2 class="who__edit-user">Edit  <span><?php echo e($user->name); ?></span> Information</h2>

                <form method="POST" action="<?php echo e(route('user.update', ['id' => $user->id])); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="user__section-first">
                        <div>
                        <?php if(file_exists(public_path('avatars/' . $user->avatar)) && $user->avatar): ?>
                            <div style="width: 230px; height: 230px;">
                                <img src="<?php echo e(asset('avatars/' . $user->avatar)); ?>" alt="User Avatar" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                        <?php else: ?>
                            <div style="width: 230px; height: 230px;">
                                <img src="<?php echo e(asset('avatars/default-avatar.png')); ?>" alt="Default Avatar" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                        <?php endif; ?>

                            <div class="user-avatar__change">
                                <label for="avatar" class="lable__avatar"><span><?php echo e($user->name); ?></span></label>
                                <div class="avatar__upload-block">
                                <input id="avatar" type="file" class="avatar__input <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="avatar">
                                    <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>
                        <div class="user__section-second">

                            <div class="inut-info__user-block">
                                <label for="name" class="user__desc-input">Name</label>
                                <div class="">
                                    <input id="name" type="text" class="user__input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $user->name)); ?>" required autocomplete="name" autofocus>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="inut-info__user-block">
                                <label for="realnamename" class="user__desc-input">Real Name</label>
                                <div class="col-md-6">
                                    <input id="realnamename" type="text" class="user__input <?php $__errorArgs = ['realnamename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="realnamename" value="<?php echo e(old('realnamename', $user->realnamename)); ?>" autocomplete="realnamename">
                                    <?php $__errorArgs = ['realnamename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="inut-info__user-block">
                                <label for="aboutuser" class="user__desc-input">About User</label>
                                <div class="">
                                    <textarea id="aboutuser" class="user__input <?php $__errorArgs = ['aboutuser'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="aboutuser" autocomplete="aboutuser"><?php echo e(old('aboutuser', $user->aboutuser)); ?></textarea>
                                    <?php $__errorArgs = ['aboutuser'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                       
                        </div>
                        
                    </div>
                    <div class="button-edit__user">
                        <button type="submit" class="confirm-edit__user">Save</button>
                    </div>
                
                       
                 
                </form>
               
            </div>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/auth/useredit.blade.php ENDPATH**/ ?>