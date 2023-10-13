<div class="<?php echo e($block->elem('main-menu')); ?>">
	<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($item['SELECTED']): ?>
			<div class="<?php echo e($block->elem('rectangle')->mod('active')); ?>">
				<?php echo e($item['TEXT']); ?>

			</div>
		<?php else: ?>
			<div class="<?php echo e($block->elem('rectangle')); ?>">
				<a class="<?php echo e($block->elem('btn')); ?>" href="<?php echo e($item["LINK"]); ?>">
				<?php echo e($item['TEXT']); ?>

				</a>
			</div>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/top_menu/top_menu.blade.php ENDPATH**/ ?>