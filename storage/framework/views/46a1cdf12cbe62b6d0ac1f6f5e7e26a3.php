<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imageboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/pico.css')); ?>" >
</head>
<body>
    <nav style="padding: 0 20px 0 20px">
        <ul>
            <li><h3><a href="<?php echo e(route('index')); ?>">NewsSiteBDSN</a></h3></li>
        </ul>
        <ul>
            <form method="POST" action="<?php echo e(route('tag_search')); ?>">
                <?php echo csrf_field(); ?>
                <li>
                    Tags: 
                    <input type="text" name="search">
                </li>
            </form>
        </ul>
        <ul>
            <?php if( auth()->check() ): ?>
                <li>
                    <a href="<?php echo e(route('profile', auth()->id())); ?>" style="color:orange;"><?php echo e(auth()->user()->name); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('auth.logout')); ?>" style="color:gray">Logout</a>
                </li>
            <?php else: ?>
            <li><a href="<?php echo e(route('auth.login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('registration')); ?>">
                Register
            </a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php if(auth()->check()): ?>
        <p style="margin-left:20px"><a href="<?php echo e(route('create_image')); ?>" style="color: green;">upload image</a></p>
    <?php endif; ?>

    <main class="container-fluid" style="padding-top: 0px">
        <br>
        <div>
            <div style="float: left; width: 15%; max-width: 300px;min-width:150px;">
                <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('tag', $tag->name )); ?>"><p><?php echo e($tag->name); ?> (<?php echo e($tag->images_count); ?>)</p></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div style="float: left; width: 80%;">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
    </main>
</body>
</html><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/layouts/layout.blade.php ENDPATH**/ ?>