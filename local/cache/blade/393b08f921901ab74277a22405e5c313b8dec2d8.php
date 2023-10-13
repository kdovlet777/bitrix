<div class="<?php echo e($block); ?>">
    <label class="label">
       <?php echo e($label); ?>

    </label>
    <select name="CATEGORY" class="<?php echo e($block->elem("input")); ?>">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/feedback/selector/selector.blade.php ENDPATH**/ ?>