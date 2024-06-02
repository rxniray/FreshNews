<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FreshNews</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" >
</head>
<body>
    <nav class="nav__header">
        <div class="nav__container">
            <div class="nav__block">
                <ul >
                    <li><h3><a href="<?php echo e(route('index')); ?>"><div class="circle__block"></div>FreshNews</a></h3></li>
                </ul>
                <ul class="nav__nav">
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
            </div>
        </div>
    </nav>
    <main style="padding-top: 0px">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH D:\Проєкти\FreshNews\resources\views/layouts/auth.blade.php ENDPATH**/ ?>