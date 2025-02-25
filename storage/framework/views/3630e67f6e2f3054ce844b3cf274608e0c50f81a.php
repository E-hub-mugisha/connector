
<?php $__env->startSection('title','service booking'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e($bookings->service->name); ?></h4>
                    <blockquote class="blockquote">
                        <p class="mb-0"><?php echo e($bookings->notes); ?></p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p class="fw-bold">Names</p>
                                <p>
                                    <?php echo e($bookings->names); ?>

                                </p>
                                <p class="fw-bold">
                                    Phone Number
                                </p>
                                <p>
                                    <?php echo e($bookings->phone); ?>

                                </p>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address class="text-primary">
                                <p class="fw-bold">
                                    E-mail
                                </p>
                                <p class="mb-2">
                                    <?php echo e($bookings->email); ?>

                                </p>
                                <p class="fw-bold">
                                    Address
                                </p>
                                <p>
                                    <?php echo e($bookings->location); ?>

                                </p>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">More Information</h4>
                    <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                    <ul class="list-arrow">
                        <li><span class="fw-bold">Amount:</span><?php echo e($bookings->total); ?></li>
                        <li><span class="fw-bold">Status:</span><?php echo e($bookings->status); ?></li>
                        <li><span class="fw-bold">Payment:</span><?php echo e($bookings->payment_mode); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin grid-margin-md-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Take action</h4>
                    <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                    <div class="row template-demo">
                        <div class="col-md-3">
                            <form id="approve-form" action="<?php echo e(route('serviceProviderBooking.approve', $bookings->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this booking?')">
                                    Approve</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form id="complete-form" action="<?php echo e(route('serviceProviderBooking.complete', $bookings->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to complete this booking?')">
                                    complete</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form id="approve-form" action="<?php echo e(route('serviceProviderBooking.cancel', $bookings->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/stadmin/bookings/show.blade.php ENDPATH**/ ?>