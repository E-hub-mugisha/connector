<?php $__env->startSection('title', 'Service booked'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
            

            <!-- User Bookings Section -->
            <div class="card bg-white card-box border-20 mb-4">
                <h3 class="dash-title-three">Your Bookings</h3>
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Service Provider</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Payment Mode</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($booking->service->name); ?></td>
                            <td><?php echo e($booking->serviceProvider->sprovider_name); ?></td>
                            <td><?php echo e($booking->status); ?></td>
                            <td><?php echo e($booking->total); ?></td>
                            <td><?php echo e($booking->payment_mode); ?></td>
                            <td><?php echo e($booking->date); ?></td>
                            <td><?php echo e($booking->time); ?></td>
                            <td><?php echo e($booking->location); ?></td>
                            <td>
                                <a href="<?php echo e(route('ServiceBookedDetail', $booking->id)); ?>" class="btn btn-info btn-sm">View</a>
                                <!--<a href="#" class="btn btn-warning btn-sm">Edit</a>-->
                                <form action="<?php echo e(route('customer.cancelBooking', $booking->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel Booking</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/bookings/index.blade.php ENDPATH**/ ?>