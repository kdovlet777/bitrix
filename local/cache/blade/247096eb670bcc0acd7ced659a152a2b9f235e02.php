<div class="<?php echo e($block->elem("long-line")); ?>"></div>
<div class="<?php echo e($block->elem("content")); ?>" id="<?php echo $itemIds['ID']; ?>" itemscope itemtype="http://schema.org/Product">
	<div class="<?php echo e($block->elem("path")); ?>">Главная  /  <p class="<?php echo e($block->elem("grey")); ?>"><?php echo e($item['NAME']); ?></p></div>
	<div class="<?php echo e($block->elem("title")); ?>">
		<?php echo e($item['NAME']); ?>

	</div>
	<div class="<?php echo e($block->elem("card-date")); ?>"><?php echo e($item['DISPLAY_ACTIVE_FROM']); ?></div>
	<div class="<?php echo e($block->elem("content-box")); ?>">
		<div class="<?php echo e($block->elem("non-image")); ?>">
			<div class="<?php echo e($block->elem("content-htext")); ?>"><?php echo e($item['PREVIEW_TEXT']); ?></div>
			<div class="<?php echo e($block->elem("content-text")); ?>">
				<?php echo $item['DETAIL_TEXT']; ?>

			</div>
			<div class="<?php echo e($block->elem("topic-text")); ?>">
				Тема: 
				<?php $__currentLoopData = $item['CATEGORIES']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a class="<?php echo e($block->elem("category-link")); ?>" href="<?php echo e($value['DETAIL_PAGE_URL']); ?>"><?php echo e($value['NAME']); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<a class="<?php echo e($block->elem("btn")); ?>" href="/news/"> <button class="<?php echo e($block->elem("card-button-detail")); ?>"><i class="fa-solid fa-arrow-left-long fa-2xl"></i><p class="<?php echo e($block->elem("card-button-text-detail")); ?>"> НАЗАД К НОВОСТЯМ </p> </button> </a>
		</div>
		<div class="<?php echo e($block->elem("image")); ?>"> 
		<img src="<?php echo e($item['DETAIL_PICTURE']['SRC']); ?>">
		</div>
	</div>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/news_detail/news_detail.blade.php ENDPATH**/ ?>