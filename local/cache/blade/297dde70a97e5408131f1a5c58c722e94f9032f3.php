<label class="<?php echo e($block); ?>" >
    <?php echo e($label); ?>

    <?php if(!empty($params["REQUIRED_FIELDS"]) && in_array($req_name, $params["REQUIRED_FIELDS"])): ?>
    	<span>*</span>
    <?php endif; ?>
</label><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/forms/label/label.blade.php ENDPATH**/ ?>