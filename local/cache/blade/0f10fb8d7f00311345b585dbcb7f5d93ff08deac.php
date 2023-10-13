<div class="<?php echo e($block); ?>">
    <label class="<?php echo e($block->elem("label")); ?>" >
        <?php echo e($label); ?>

        <?php if(empty($params["REQUIRED_FIELDS"]) || in_array("NAME", $params["REQUIRED_FIELDS"])): ?>
        	<span class="mf-req">*</span>
        <?php endif; ?>
    </label>
    <input placeholder="<?php echo e($placeholder); ?>" type="text" class="<?php echo e($block->elem("input")); ?>" name="user_name" value="<?php echo e($item["AUTHOR_NAME"]); ?>">
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/feedback/input/input.blade.php ENDPATH**/ ?>