<div class="<?php echo e($block); ?>">
	<div class="<?php echo e($block->elem('logo')); ?>">
		<img src="<?php echo e($assets->url('img/Vector.png')); ?>">
		<p class="<?php echo e($block->elem('navbar-text')); ?>">ГАЛАКТИЧЕСКИЙ<br>ВЕСТНИК</p>
	</div>
	<div class="<?php echo e($block->elem('head')); ?>">
		<?php echo $top_menu; ?>

		<?php echo $pod_menu; ?>

		<?php echo $search; ?>

		<a href="/?logout=yes&<?=bitrix_sessid_get()?>">Выйти</a>
	</div>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/header/header.blade.php ENDPATH**/ ?>