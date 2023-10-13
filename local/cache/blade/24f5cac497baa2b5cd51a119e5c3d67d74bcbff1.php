<div class="<?php echo e($block->elem("content")); ?>">
    <?php echo $title; ?>

    <div class="<?php echo e($block->elem("info")); ?>">
        Вы зашли на страницу обратной связи, задайте нам вопрос!
    </div>
     
    <div id="msg">
        <?php if(!empty($item["ERROR_MESSAGE"])): ?>
        <ul class="<?php echo e($block->elem("message")); ?>">
            <?php $__currentLoopData = $item["ERROR_MESSAGE"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(ShowError($v)); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php elseif(!empty($_GET['success'])): ?>
        <div class="<?php echo e($block->elem("ok")); ?>">
            Ваше обращение получено
        </div>
        <?php endif; ?>
    </div>
    
    <form class="<?php echo e($block->elem("send")); ?>" id="<?php echo e($id); ?>" method="<?php echo e($method); ?>" action="<?php echo e($action); ?>">
        <?php echo bitrix_sessid_post(); ?>

            <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $elem; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>

</div>
<?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/common/form/form.blade.php ENDPATH**/ ?>