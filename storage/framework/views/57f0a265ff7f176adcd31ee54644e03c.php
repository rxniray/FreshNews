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
    <main style="padding-top: 0px">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH D:\Проєкти\simple-laravel-imageboard-main\resources\views/layouts/auth.blade.php ENDPATH**/ ?>