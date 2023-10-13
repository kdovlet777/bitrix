<div class="<?php echo e($block); ?>">
    <label class="<?php echo e($block->elem("label")); ?>" >
        <?php echo e(GetMessage("MFT_NAME")); ?>

        <?php if(empty($params["REQUIRED_FIELDS"]) || in_array("NAME", $params["REQUIRED_FIELDS"])): ?>
        	<span class="mf-req">*</span>
        <?php endif; ?>
    </label>
    <input placeholder="Иван" type="text" id="name" class="<?php echo e($block->elem("input")); ?>" name="user_name" value="<?php echo e($item["AUTHOR_NAME"]); ?>">
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/feedback/name/name.blade.php ENDPATH**/ ?>