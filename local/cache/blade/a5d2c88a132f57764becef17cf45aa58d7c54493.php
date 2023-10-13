<div class="<?php echo e($block->elem("section")); ?>" id=<?php echo e($itemIds['ID']); ?> itemscope="" itemtype="http://schema.org/Product">
	<div class="<?php echo e($block->elem("container-picture")); ?>" data-entity="images-container">
		<h2 class="<?php echo e($block->elem("title")); ?>"><?php echo e($item['NAME']); ?></h2>
		<img style="cursor: zoom-in;" class="<?php echo e($block->elem("imag")); ?>"  itemprop="image" src="<?php echo e($item['DETAIL_PICTURE']['SRC']); ?>">
		<?php $__currentLoopData = $item['DISPLAY_PROPERTIES']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="<?php echo e($block->elem("property-text")); ?>">
			<?php if(isset($value['LINK_ELEMENT_VALUE'][$value['VALUE'][0]]['NAME'])): ?>
				 <div class="<?php echo e($block->elem("text-left")); ?>"><?php echo e($value['NAME']); ?></div>
				 <div class="<?php echo e($block->elem("text-right")); ?>"><?php echo e($value['LINK_ELEMENT_VALUE'][$value['VALUE'][0]]['NAME']); ?>

				 </div>
			<?php else: ?>
				<div class="<?php echo e($block->elem("text-left")); ?>"> <?php echo e($value['NAME']); ?></div>
				<div class="<?php echo e($block->elem("text-right")); ?>"> <?php echo e($value['VALUE']); ?></div>
			<?php endif; ?>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<a href="/books/" class="<?php echo e($block->elem("lists-btn")); ?>">
			Назад к списку
		</a>
	</div>
	<div class="<?php echo e($block->elem("container-price")); ?>">
		<div class="<?php echo e($block->elem("price-box")); ?>">
			<div class="<?php echo e($block->elem("price")); ?>">
				<?php if($item['ITEM_PRICES'][0]['DISCOUNT'] > 0): ?>
					<div class="<?php echo e($block->elem("price")->mod("old")); ?>" id=<?php echo e($itemIds['OLD_PRICE_ID']); ?>><?php echo $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE']; ?></div>
					<div class="<?php echo e($block->elem("price")->mod("new")); ?>" id=<?php echo e($itemIds['PRICE_ID']); ?>><?php echo $item['ITEM_PRICES'][0]['PRINT_RATIO_PRICE']; ?></div>
				<?php else: ?>
					<div class="<?php echo e($block->elem("price")); ?>"><?php echo $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE']; ?></div>
				<?php endif; ?>
			</div>
			<div data-entity="main-button-container">
				<div id="<?php echo e($itemIds['BASKET_ACTIONS_ID']); ?>">
					<div>
						<a class="<?php echo e($block->elem("buy-btn")); ?>" id="<?php echo e($itemIds['BUY_LINK']); ?>" href="javascript:void(0);">
							<span style="color: white;">В корзину</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/catalog/section_detail/section_detail.blade.php ENDPATH**/ ?>