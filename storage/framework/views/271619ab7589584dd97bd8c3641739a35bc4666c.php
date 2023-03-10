<div>
    <h2><?php echo e($brand); ?> product</h2>
    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($brand->name); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH D:\hile\hiletasker\hiletask\resources\views/livewire/shop/product-brand-component.blade.php ENDPATH**/ ?>