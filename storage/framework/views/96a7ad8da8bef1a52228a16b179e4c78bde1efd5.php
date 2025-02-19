
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
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Your Order is <span style="color: #a8729a;"></span><?php echo e($booking->id); ?></h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Service booked</p>
                            </div>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($booking->service->image); ?>" class="img-fluid" alt="image">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                        <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Service Name: &nbsp;<span><?php echo e($booking->service->name); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <div class="card card-raised bg-light">
                                        <div class="card-body pt-2">
                                            <h3 class="fw-bold mb-0">Booking Details</h3>

                                            <p class="text-muted mb-0"><span class="fs--1 text-bold mb-0">Names:</span><?php echo e($booking->names); ?> </p>
                                            <p class="text-muted mb-0"><span class="fs--1 text-bold mb-0">Email:</span><?php echo e($booking->email); ?> </p>

                                            <p class="text-muted mb-0"><span class="fs--1 text-bold mb-0">Phone:</span><?php echo e($booking->phone); ?> </p>
                                            <p class="text-muted mb-0"><span class="fs--1 text-bold mb-0">Location:</span><?php echo e($booking->location); ?></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 mb-4">
                                    <div class="card card-shadow">
                                        <div class="card-body py-5">
                                            <h5 class="fw-bold fs-1 text-darker mb-3">Order Detail : </h5>
                                            <p class="text-muted mb-0">Date & Time : <span class="fs--1 text-muted mb-0"><?php echo e($booking->date); ?> at <?php echo e($booking->time); ?></span></p>
                                            <p class="text-muted mb-0">Status : <span class="fs--1 text-muted mb-0"><?php echo e($booking->status); ?></span></p>
                                            <p class="text-muted mb-0">Payment Mode : <span class="fs--1 text-muted mb-0"><?php echo e($booking->payment_mode); ?></span></p>
                                            <p class="fs--1 text-uppercase text-gray-700 mb-0">Total Amount:<span class="fs--1 text-muted mb-0"><?php echo e($booking->total); ?></span></p>
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

                                <a href="#" type="button" class="btn btn-primary px-3"><i class="fas fa-reply" aria-hidden="true"></i>Back</a>
                                <a onclick="confirm('are you sure, you want to update this!')" type="button" class="btn btn-success px-3"><i class="far fa-thumbs-up" aria-hidden="true"></i>Accept</a>
                                <a onclick="confirm('are you sure, you want to cancel this!')" type="button" class="btn btn-danger px-3"><i class="fas fa-bolt" aria-hidden="true"></i>Cancel</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/bookings/show.blade.php ENDPATH**/ ?>