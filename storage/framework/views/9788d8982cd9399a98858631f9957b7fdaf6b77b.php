<?php $__env->startSection('title','Newsletter'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <a href="<?php echo e(route('admin.newsletterSubscriptions.index')); ?>" type="button" class="btn btn-primary btn-sm m-2">
        Back to Lists
    </a>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Newsletter Subscription detail</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Email: <?php echo e($subscription->email); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/newsletters/show.blade.php ENDPATH**/ ?>