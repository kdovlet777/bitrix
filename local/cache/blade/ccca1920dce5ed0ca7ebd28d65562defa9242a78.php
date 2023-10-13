<div class="<?php echo e($block->elem("content")); ?>">
		<?php $__currentLoopData = $arResult['ITEM_ROWS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
		?>
			<div class="<?php echo e($block->elem("section")); ?>">
					<?php $__currentLoopData = $rowItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="<?php echo e($block->elem("kart")); ?>">
							<a style="text-decoration:none; color: inherit;" href="<?php echo e($item['DETAIL_PAGE_URL']); ?>">
							<span class="<?php echo e($block->elem("product-item-image-wrapper")); ?>">
								<span class="<?php echo e($block->elem("product-item-image-original")); ?>"
									style="background-image: url('<?php echo e($item['PREVIEW_PICTURE']['SRC']); ?>');">
								</span>
							</span>
							
							<div class="<?php echo e($block->elem("kart-title")); ?>"><?php echo e($item['NAME']); ?></div>
							
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
								<div class="<?php echo e($block->elem("price")); ?>">
									<?php if($item['ITEM_PRICES'][0]['DISCOUNT'] > 0): ?>
										<div class="<?php echo e($block->elem("price")->mod("old")); ?>"><?php echo $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE']; ?></div>
										<div class="<?php echo e($block->elem("price")->mod("new")); ?>"><?php echo $item['ITEM_PRICES'][0]['PRINT_RATIO_PRICE']; ?></div>
									<?php else: ?>
										<div class="<?php echo e($block->elem("price")); ?>"><?php echo $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE']; ?></div>
									<?php endif; ?>
								</div>
							</a>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/catalog/section/section.blade.php ENDPATH**/ ?>