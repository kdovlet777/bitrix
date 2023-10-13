<div class="<?php echo e($block->elem('sub-menu')); ?>">
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<a
	<?php if($item['SELECTED']): ?>
	class="<?php echo e($block->elem('pod_menu')->mod('active')); ?>"
    <?php else: ?>
	class="<?php echo e($block->elem('pod_menu')); ?>"
	<?php endif; ?>
	style="text-decoration: none;" href="<?php echo e($item['LINK']); ?>"><?php echo e($item['TEXT']); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/pod_menu/pod_menu.blade.php ENDPATH**/ ?>