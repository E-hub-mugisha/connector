<?php $__env->startComponent('mail::message'); ?>
<h2>Hey, It's me <?php echo e($mailData['name']); ?></h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong><?php echo e($mailData['name']); ?> <br>
<strong>Email: </strong><?php echo e($mailData['email']); ?> <br>
<strong>Phone: </strong><?php echo e($mailData['phone']); ?> <br>
<strong>Subject: </strong><?php echo e($mailData['subject']); ?> <br>
<strong>Message: </strong><?php echo e($mailData['message']); ?> <br><br>
  
Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/emails/providerEmail.blade.php ENDPATH**/ ?>