<div class="<?php echo e($block->elem("banner")); ?>">
    <div class="swiper" style="height: 100%;">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <img class="<?php echo e($block->elem("ban-image")); ?>" src="<?php echo e($item['PREVIEW_PICTURE']['SRC']); ?>">
                <div class="<?php echo e($block->elem("ban-text")); ?>">
                        <a href="<?php echo e($item['DETAIL_PAGE_URL']); ?>" style="text-decoration: none;"><div class="<?php echo e($block->elem("ban-text-title")); ?>"><?php echo e($item['NAME']); ?></div>
                        <div class="<?php echo e($block->elem("ban-text-body")); ?>"><?php echo e($item['PREVIEW_TEXT']); ?></div></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-next <?php echo e($block->elem("swiper-button-next")); ?>"></div>
        <div class="swiper-button-prev <?php echo e($block->elem("swiper-button-prev")); ?>"></div>
    </div>
</div> <?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/banner/banner.blade.php ENDPATH**/ ?>