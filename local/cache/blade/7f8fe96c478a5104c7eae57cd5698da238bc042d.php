<div class="<?php echo e($block); ?>">
    <label class="label">
       <?php echo e(GetMessage("MFT_CATEGORY")); ?>

        <?php if(empty($params["REQUIRED_FIELDS"]) || in_array("EMAIL", $params["REQUIRED_FIELDS"])): ?>
        	<span class="mf-req">*</span>
        <?php endif; ?>
    </label>
    <select name="CATEGORY" class="<?php echo e($block->elem("input")); ?>">
        <?php $__currentLoopData = $item['CATEGORIES']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/feedback/category/category.blade.php ENDPATH**/ ?>