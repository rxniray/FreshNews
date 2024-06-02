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
                <ul>
                    <li><h3><a href="<?php echo e(route('index')); ?>"><div class="circle__block"></div>FreshNews</a></h3></li>
                </ul>
                <ul class="search__tags">
            <form method="POST" action="<?php echo e(route('tag_search')); ?>">
                <?php echo csrf_field(); ?>
                <li> 
                    <input type="text" name="search" placeholder="Search...">
                </li>
            </form>
        </ul>
                <ul class="nav__nav">
                    <?php if( auth()->check() ): ?>
                        <li>
                            <a href="<?php echo e(route('auth.logout')); ?>" class="logout__button">Logout</a>
                        </li>
                        <li class="avatar-user__header">
                            <a href="<?php echo e(route('profile', auth()->id())); ?>" class="nickname-user__avatar"><?php echo e(auth()->user()->name); ?> <span><</span></a>

                            <a href="<?php echo e(route('profile', auth()->id())); ?>" >
                                <div style="width: 40px; height: 40px; ">
                                <img src="<?php echo e(asset('avatars/' . (auth()->user()->avatar && file_exists(public_path('avatars/' . auth()->user()->avatar)) ? auth()->user()->avatar : 'default-avatar.png'))); ?>" 
                                    alt="User Avatar" 
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                </div>
                            </a>
                        </li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('auth.login')); ?>" class="log-reg__button">Login</a></li>
                        <li><a href="<?php echo e(route('registration')); ?>" class="log-reg__button">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
    </nav>
    <main class="main__content" style="padding-top: 0px">
        
        <div class="main__container">
            <div class="main__blocks">
                <div class="aside__block">
                <?php if(auth()->check()): ?>
                    <p class="upload__image"><a href="<?php echo e(route('create_image')); ?>">Upload News</a></p>
                <?php endif; ?>
                <div class="tags__list">
                    <h4>Themes</h4>
                <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('tag', $tag->name )); ?>"><p><?php echo e($tag->name); ?> (<?php echo e($tag->images_count); ?>)</p></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </div>
                <div class="main__block">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
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
</html><?php /**PATH /home/rxniray/Проєкти/FreshNews/resources/views/layouts/layout.blade.php ENDPATH**/ ?>