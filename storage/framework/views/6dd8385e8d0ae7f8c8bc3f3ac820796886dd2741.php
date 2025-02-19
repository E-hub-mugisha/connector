<div class="partner-logos border-0 pt-150 xl-pt-120 md-pt-80 sm-pt-40 pb-80 lg-pb-40">
    <div class="partner-slider">
        <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="logo d-flex "><img src="<?php echo e(asset('image/partner')); ?>/<?php echo e($partner->image); ?>" alt="<?php echo e($partner->name); ?>"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- /.partner-logos --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/includes/brands.blade.php ENDPATH**/ ?>