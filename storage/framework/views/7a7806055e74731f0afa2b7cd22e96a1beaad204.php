<?php $__env->startComponent('mail::message'); ?>
# Booking Confirmation

Hello **<?php echo e($mailData['names']); ?>**,

Thank you for booking **<?php echo e($mailData['service_name']); ?>**. Your booking details are below:

### **Booking Details**
- **Service:** <?php echo e($mailData['service_name']); ?>

- **Date & Time:** <?php echo e($mailData['date']); ?> at <?php echo e($mailData['time']); ?>

- **Payment Mode:** <?php echo e($mailData['payment_mode']); ?>

- **Location:** <?php echo e($mailData['location']); ?>


<?php if($mailData['notes']): ?>
- **Notes:** <?php echo e($mailData['notes']); ?>

<?php endif; ?>

<?php $__env->startComponent('mail::button', ['url' => route('home.payment')]); ?>
Proceed to Payment
<?php echo $__env->renderComponent(); ?>

If you have any questions, feel free to contact us.

Thanks,<br>
**<?php echo e(config('app.name')); ?>**
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\connector\well-known\hiletask\resources\views/emails/user_booking.blade.php ENDPATH**/ ?>