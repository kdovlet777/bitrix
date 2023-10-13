<div class="<?php echo e($block->elem("content")); ?>">
        <div>
            <ul class="<?php echo e($block->elem("message")); ?>">
                <?php if(!empty($item["ERROR_MESSAGE"])): ?>
                    <?php $__currentLoopData = $item["ERROR_MESSAGE"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        	ShowError($v);
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($item["OK_MESSAGE"] <> ''): ?>{?>
                    <div class="<?php echo e($block->elem("mf-ok-text")); ?>"><?php echo e($item["OK_MESSAGE"]); ?></div>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(!empty($_GET['success'])): ?>
    	<div class="<?php echo e($block->elem("ok")); ?>">
    		Ваше обращение получено
    	</div>
  		<?php else: ?>
        <form id="<?php echo e($id); ?>" method="<?php echo e($method); ?>" action="<?php echo e($action); ?>">
            <?php echo bitrix_sessid_post(); ?>

                <?php echo $name; ?>

                <?php echo $email; ?>

                <?php echo $text; ?>

                <?php echo $category; ?>

                <?php echo $sendbutton; ?>

                <input type="hidden" name="PARAMS_HASH" value="<?php echo e($item["PARAMS_HASH"]); ?>">
        </form>
        <?php endif; ?>
</div>
<?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/feedback/feedback.blade.php ENDPATH**/ ?>