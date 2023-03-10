<?php $__env->startComponent('mail::message'); ?>
<h2>Hey, It's me <?php echo e($data->names); ?></h2> 
<br>
<strong>Email: </strong><?php echo e($data->email); ?> <br>

<h2>New subscription</h2>
  
Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/emails/newsMail.blade.php ENDPATH**/ ?>