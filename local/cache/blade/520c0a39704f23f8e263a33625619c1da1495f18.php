<div class="<?php echo e($block->elem("content")); ?>">
	<?php if($items['CATEGORY_NAME']): ?>
		<?php echo $title; ?>

	<?php endif; ?>
	<div class="<?php echo e($block->elem("blocks")); ?>">
		<?php $__currentLoopData = $items['ITEMS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="<?php echo e($block->elem("card")); ?>">
			 <div class="<?php echo e($block->elem("card-date")); ?>">
			 	<p class="<?php echo e($block->elem("card-date-text")); ?>"> 
			 		<?php echo e($item['DISPLAY_ACTIVE_FROM']); ?>

                </p>
             </div>
             <div class="<?php echo e($block->elem("card-title")); ?>"><?php echo e($item['NAME']); ?></div>
             <div class="<?php echo e($block->elem("card-text")); ?>"><?php echo e($item['PREVIEW_TEXT']); ?></div>
             <a class="<?php echo e($block->elem("btn")); ?>" href="<?php echo e($item['DETAIL_PAGE_URL']); ?>"><button class="<?php echo e($block->elem("card-button")); ?>"><p class="<?php echo e($block->elem("card-button-text")); ?>"> ПОДРОБНЕЕ </p><i class="fa-solid fa-arrow-right-long fa-2xl"></i></button></a>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/news/news.blade.php ENDPATH**/ ?>