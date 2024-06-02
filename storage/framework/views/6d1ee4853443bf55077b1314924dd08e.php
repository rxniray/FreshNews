<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="<?php echo e(__('Pagination Navigation')); ?>" class="">
        <div class="">
            <?php if($paginator->onFirstPage()): ?>
                <p class="span__first-pagination">
                    <?php echo __('Попередня сторінка'); ?>

                </p>
            <?php else: ?>
                <a class="a__first-pagination" href="<?php echo e($paginator->previousPageUrl()); ?>" class="" >
                    <?php echo __('Попередня сторінка'); ?>

                </a>
            <?php endif; ?>

            
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <span aria-disabled="true">
                                <span class=""><?php echo e($element); ?></span>
                            </span>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span class="span__number-pagination" aria-current="page">
                                        <span class="span__second-number-pagination"><?php echo e($page); ?></span>
                                    </span>
                                <?php else: ?>
                                    <a class="a__number-pagination" href="<?php echo e($url); ?>"  aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>">
                                        <?php echo e($page); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <a class="a__second-pagination" href="<?php echo e($paginator->nextPageUrl()); ?>" >
                    <?php echo __('Наступна сторінка'); ?>

                </a>
            <?php else: ?>
                <span class="span__second-pagination">
                    <?php echo __('Наступна сторінка'); ?>

                </span>
            <?php endif; ?>
        </div>

        <div class="results__pagination">
            <div class="results__pagination-block">
                <p class="">
                    <?php echo __('Показано від'); ?>

                    <?php if($paginator->firstItem()): ?>
                        <span class="font-medium"><?php echo e($paginator->firstItem()); ?></span>
                        <?php echo __('до'); ?>

                        <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    <?php else: ?>
                        <?php echo e($paginator->count()); ?>

                    <?php endif; ?>
                    <?php echo __('з'); ?>

                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('результатів'); ?>

                </p>
            </div>

            <!-- <div>
                <span class="">
                    
                    <?php if($paginator->onFirstPage()): ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.previous')); ?>">
                            <span class="" aria-hidden="true">
                                <svg class="" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="" aria-label="<?php echo e(__('pagination.previous')); ?>">
                            <svg class="" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    <?php endif; ?>

                   

                    
                    <?php if($paginator->hasMorePages()): ?>
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="<?php echo e(__('pagination.next')); ?>">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    <?php else: ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.next')); ?>">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    <?php endif; ?>
                </span>
            </div> -->
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH D:\Проєкти\FreshNews\vendor\laravel\framework\src\Illuminate\Pagination/resources/views/tailwind.blade.php ENDPATH**/ ?>