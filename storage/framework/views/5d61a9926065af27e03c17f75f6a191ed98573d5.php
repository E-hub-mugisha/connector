<?php $__env->startComponent('mail::message'); ?>
<h2>Hey <?php echo e($responseData['names']); ?>, </h2> 
<br>
<h2>It's me <?php echo e($responseData['name']); ?></h2>
<h2>Your request has been <?php echo e($responseData['status']); ?></h2>

Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/emails/feedback.blade.php ENDPATH**/ ?>