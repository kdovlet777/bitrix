<div class="<?php echo e($block); ?>">
	<?php echo $title; ?>

	<div class="<?php echo e($block->elem("buttons")); ?>">
		<button class="<?php echo e($block->elem('selectorbtn')); ?>" id="tulabtn">Офис в Туле</button>
		<button class="<?php echo e($block->elem('selectorbtn')); ?>" id="moscowbtn">Офис в Москве</button>
	</div>
	<div id="tulaMap" class="<?php echo e($block->elem("content")); ?>">
		<div id="officeTulaYandexMap" style="height: 60vh;"></div>
		<p>г. Тула, ул. Ф. Смирнова ул., д. 28<br>Тел. / Факс: (4872) 250-450, 57-05-01</p>
	</div>
	<div id="moscowMap" class="<?php echo e($block->elem("content")); ?>">
		<div id="officeMoscowYandexMap" style="height: 60vh;"></div>
		<p>г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж). <br> Тел. / Факс: (495) 933-62-10</p>
	</div>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/map/map.blade.php ENDPATH**/ ?>