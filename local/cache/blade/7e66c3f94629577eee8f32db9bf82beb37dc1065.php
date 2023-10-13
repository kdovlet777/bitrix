<div class="<?php echo e($block); ?>">
    <label class="<?php echo e($block->elem("label")); ?>" >
    	<?php echo e($label); ?>

        <?php if(empty($params["REQUIRED_FIELDS"]) || in_array("EMAIL", $params["REQUIRED_FIELDS"])): ?>
            <span class="mf-req">*</span>
        <?php endif; ?>
    </label>
    <br>
    <textarea placeholder="<?php echo e($placeholder); ?>" class="<?php echo e($block->elem("inputtext")); ?>" name="MESSAGE" ><?php echo e($item["MESSAGE"]); ?></textarea>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/feedback/text/text.blade.php ENDPATH**/ ?>