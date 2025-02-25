<?php $__env->startComponent('mail::message'); ?>
<h2>Hey, It's me <?php echo e($mailData['names']); ?></h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong><?php echo e($mailData['names']); ?> <br>
<strong>Email: </strong><?php echo e($mailData['email']); ?> <br>
<strong>Phone: </strong><?php echo e($mailData['phone']); ?> <br>
<strong>Location: </strong><?php echo e($mailData['location']); ?> <br>

<h2>I am requesting for <?php echo e($mailData['service_name']); ?></h2>
<strong>When: </strong><?php echo e($mailData['date']); ?> at <?php echo e($mailData['time']); ?> <br><br>
<strong>Payment Mode: </strong><?php echo e($mailData['payment_mode']); ?> <br>
<br>
<?php $__env->startComponent('mail::button', ['url' => route('sprovider.dashboard')]); ?>
Verify
<?php echo $__env->renderComponent(); ?>


Thank you,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/emails/bookMail.blade.php ENDPATH**/ ?>