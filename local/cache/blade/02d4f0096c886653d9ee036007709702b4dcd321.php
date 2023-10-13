<div class="<?php echo e($block); ?>">
    <label class="<?php echo e($block->elem("label")); ?>">
        <?php echo e($label); ?>

        <?php if(empty($params["REQUIRED_FIELDS"]) || in_array("EMAIL", $params["REQUIRED_FIELDS"])): ?>
        	<span class="mf-req">*</span>
        <?php endif; ?>
    </label>
    <input placeholder="<?php echo e($placeholder); ?>" id="email" type="text" class="<?php echo e($block->elem("input")); ?>" name="user_email" value="<?php echo e($item["AUTHOR_EMAIL"]); ?>">
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/forms/email/email.blade.php ENDPATH**/ ?>