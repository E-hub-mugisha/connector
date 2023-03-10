<?php $__env->startComponent('mail::message'); ?>
<h2>Hey, It's me <?php echo e($data->names); ?></h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong><?php echo e($data->names); ?> <br>
<strong>Email: </strong><?php echo e($data->email); ?> <br>
<strong>Phone: </strong><?php echo e($data->phone); ?> <br>
<strong>Location: </strong><?php echo e($data->location); ?> <br>

<strong>Payment Mode: </strong><?php echo e($data->payment_mode); ?> <br>
  
Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/emails/orderMail.blade.php ENDPATH**/ ?>