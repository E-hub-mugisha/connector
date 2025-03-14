
<?php $__env->startSection('title', 'Payment'); ?>
<?php $__env->startSection('content'); ?>
<div class="container text-center">
    <h2>Complete Your Payment</h2>
    <p>You are about to pay <strong>$<?php echo e($booking->total); ?></strong> for <strong><?php echo e($booking->service->name); ?></strong>.</p>

    <form action="<?php echo e(route('payment.process')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="booking_id" value="<?php echo e($booking->id); ?>">
        <button type="submit" class="btn btn-success">Pay with Flutterwave</button>
    </form>

    <br>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Cancel</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/services/form.blade.php ENDPATH**/ ?>