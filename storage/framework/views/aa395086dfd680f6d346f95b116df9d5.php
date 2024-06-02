<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FreshNews</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" >
    <link id="favicon" rel="icon" href="<?php echo e(asset('favicon-active.ico')); ?>" type="image/x-icon">
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
                            <a href="<?php echo e(route('auth.logout')); ?>" class="logout__button">Logout</a>
                        </li>
                        <li class="avatar-user__header">
                            <a href="<?php echo e(route('profile', auth()->id())); ?>" class="nickname-user__avatar"><?php echo e(auth()->user()->name); ?> <span><</span></a>
                        </li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('auth.login')); ?>" class="log-reg__button">Login</a></li>
                    <li><a href="<?php echo e(route('registration')); ?>" class="log-reg__button">Register</a></li>
                <?php endif; ?>
            </ul>
            </div>
        </div>
    </nav>
    <main style="padding-top: 0px">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
<script>
    document.addEventListener('visibilitychange', function() {
        var favicon = document.getElementById('favicon');
        if (document.hidden) {
            // Користувач неактивний
            favicon.href = '<?php echo e(asset('favicon-inactive.ico')); ?>';
        } else {
            // Користувач активний
            favicon.href = '<?php echo e(asset('favicon-active.ico')); ?>';
        }
    });
</script>

</body>
</html><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/layouts/auth.blade.php ENDPATH**/ ?>