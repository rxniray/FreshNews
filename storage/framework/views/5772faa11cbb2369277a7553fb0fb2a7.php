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
                <ul>
                    <li><h3><a href="<?php echo e(route('index')); ?>"><div class="circle__block"></div>FreshNews</a></h3></li>
                </ul>
                <ul class="search__tags">
            <form method="POST" action="<?php echo e(route('tag_search')); ?>">
                <?php echo csrf_field(); ?>
                <li> 
                    <input type="text" name="search" placeholder="Пошук...">
                </li>
            </form>
        </ul>
                <ul class="nav__nav">
                    <?php if( auth()->check() ): ?>
                        <li>
                            <a href="<?php echo e(route('profile', auth()->id())); ?>" style="color:orange;"><?php echo e(auth()->user()->name); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('auth.logout')); ?>">Logout</a>
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
    <main class="main__content" style="padding-top: 0px">
        
        <div class="main__container">
            <div class="main__blocks">
                <div class="aside__block">
                <?php if(auth()->check()): ?>
                    <p class="upload__image"><a href="<?php echo e(route('create_image')); ?>">Upload News</a></p>
                <?php endif; ?>
                <div class="tags__list">
                    <h4>Тематика</h4>
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
</body>
</html><?php /**PATH D:\Проєкти\NewsSiteFORCOURSE\resources\views/layouts/layout.blade.php ENDPATH**/ ?>