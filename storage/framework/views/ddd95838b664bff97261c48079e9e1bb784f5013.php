
<?php $__env->startSection('title','Service booking detail'); ?>
<?php $__env->startSection('content'); ?>


        <div class="container">
            <section class="h-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12">
                            <div class="card" style="border-radius: 10px;">
                                <?php if(Session::has('message')): ?>
                                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Service Provider: <span><?php echo e($booking->serviceProvider->sprovider_name); ?></span></p>
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Service booked: <span><?php echo e($booking->service->name); ?></span></p>
                                    </div>
                                    <div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($booking->service->image); ?>" class="img-fluid"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="card card-raised bg-light">
                                                <div class="card-body pt-2">
                                                    <h3 class="fw-bold mb-0">Booking Details</h3>

                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Names:</span><?php echo e($booking->names); ?>

                                                    </p>
                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Email:</span><?php echo e($booking->email); ?>

                                                    </p>

                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Phone:</span><?php echo e($booking->phone); ?>

                                                    </p>
                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Location:</span><?php echo e($booking->location); ?>

                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 mb-4">
                                            <div class="card card-shadow">
                                                <div class="card-body py-5">
                                                    <h5 class="fw-bold fs-1 text-darker mb-3">Order Detail : </h5>
                                                    <p class="text-muted mb-0">Date & Time : <span
                                                            class="fs--1 text-muted mb-0"><?php echo e($booking->date); ?> at
                                                            <?php echo e($booking->time); ?></span></p>
                                                    <p class="text-muted mb-0">Status : <span
                                                            class="fs--1 text-muted mb-0"><?php echo e($booking->status); ?></span>
                                                    </p>
                                                    <p class="text-muted mb-0">Payment Mode : <span
                                                            class="fs--1 text-muted mb-0"><?php echo e($booking->payment_mode); ?></span>
                                                    </p>
                                                    <p class="fs--1 text-uppercase text-gray-700 mb-0">Total
                                                        Amount:<span
                                                            class="fs--1 text-muted mb-0"><?php echo e($booking->total); ?></span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-12 justify-content-between mb-5">
                                            <div class="card card-raised bg-light">
                                                <div class="card-body pt-2">
                                                    <p class="fw-bold mb-0">Order Note : </p>
                                                    <p><?php echo e($booking->notes); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pt-2">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Reschedule
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <?php if(Session::has('message')): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <?php echo e(Session::get('message')); ?></div>
                                                    <?php endif; ?>
                                                    <form action="<?php echo e(route('BookingReschedule', $booking->id)); ?>" method="POST"
                                                        enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reschedule
                                                                Booking</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                                <label>Date *</label>
                                                                <input type="date" class="form-control" id="date"
                                                                    name="date" required>
                                                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            <!-- /.dash-input-wrapper -->

                                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                                <label>Time *</label>
                                                                <input type="time" class="form-control" id="time"
                                                                    name="time" required>
                                                                <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            <!-- /.dash-input-wrapper -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Reschedule
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?php echo e(route('customer.cancelBooking', $booking->id)); ?>" method="POST"
                                            style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel
                                                Booking</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/bookings/show.blade.php ENDPATH**/ ?>