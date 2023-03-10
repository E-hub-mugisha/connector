<?php $__env->startComponent('mail::message'); ?>
<h2>Hey, It's me <?php echo e($data->names); ?></h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong><?php echo e($data->names); ?> <br>
<strong>Email: </strong><?php echo e($data->email); ?> <br>
<strong>Phone: </strong><?php echo e($data->phone); ?> <br>
<strong>Location: </strong><?php echo e($data->location); ?> <br>

<h2>I am requesting for <?php echo e($data->service_name); ?></h2>
<strong>Service Provider: </strong><?php echo e($data->service_provider); ?> <br>
<strong>When: </strong><?php echo e($data->date); ?> at <?php echo e($data->time); ?> <br><br>
<strong>Payment Mode: </strong><?php echo e($data->payment_mode); ?> <br>
  
Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/emails/bookingMail.blade.php ENDPATH**/ ?>