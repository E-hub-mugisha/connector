<?php $__env->startSection('title', 'Booking'); ?>
<?php $__env->startSection('content'); ?>
<div>
    <!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
    <div class="inner-banner-one position-relative">
        <div class="container">
            <div class="position-relative">
                <div class="row">
                    <div class="col-xl-6 m-auto text-center">
                        <div class="title-two">
                            <h2 class="text-white">Booking</h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20">your Favorite service</p>
                    </div>
                </div>

            </div>
        </div>
        <img src="<?php echo e(asset('images/lazy.svg')); ?>" data-src="<?php echo e(asset('images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
        <img src="<?php echo e(asset('images/lazy.svg')); ?>" data-src="<?php echo e(asset('images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->



    <!-- 
		=============================================
			Pricing Section
		============================================== 
		-->
    <section class="pricing-section bg-color pt-100 lg-pt-70 pb-90 lg-pb-60">
        <div class="container">

            <div class="row">
                <div class="col-xxl-10 m-auto">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="/bookNow" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-center">

                            <div class="col-lg-5 col-md-5">
                                <div class="pricing-card-one border-0 mt-25">
                                    <div class="pack-name" hidden>HTSRV<?php echo e($service->id); ?></div>
                                    <div style="font-size: 24px; font-weight:700;">
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;"> Service Name: <span class="text-muted mb-2"><?php echo e($service->name); ?></span></p>
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Category: <span class="text-muted mb-2"><?php echo e($service->category->name); ?></span></p>
                                    </div>
                                    <hr/>
                                    <div style="font-size: 24px; font-weight:700;">
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Provider Name: <span class="text-muted mb-2"><?php echo e($service->provider->sprovider_name); ?></span></p>
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Provider Email: <span class="text-muted mb-2"><?php echo e($service->provider->proEmail); ?></span></p>
                                    </div>
                                    <input hidden type="text" class="form-control" id="service_id" name="service_id" value="<?php echo e($service->id); ?>" required>
                                    <input hidden type="text" class="form-control" id="service_provider_id" name="service_provider_id" value="<?php echo e($service->service_provider_id); ?>" required>
                                    <input hidden type="text" class="form-control" id="service_name" name="service_name" value="<?php echo e($service->name); ?>" required>
                                    <input hidden type="text" class="form-control" id="service_provider" name="service_provider" value="<?php echo e($service->provider->sprovider_name); ?>" required>
                                    <input hidden type="text" class="form-control" id="proEmail" name="proEmail" value="<?php echo e($service->provider->proEmail); ?>" required>
                                    <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <?php
                                    $total = $service->price;
                                    ?>
                                    <?php if($service->discount): ?>
                                    <?php if($service->discount_type == 'fixed'): ?>
                                    <div class="discount-fix">
                                        Discount:<span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?></span>
                                    </div>
                                    <div class="discount-fix-total">
                                        <span><?php $total = $total-$service->discount; ?></span>
                                    </div>
                                    <?php elseif($service->discount_type == 'percent'): ?>
                                    <div class="discount-per">
                                        Discount:<span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?>%</span>
                                    </div>
                                    <div class="discount-per-total" style="margin:6px;">
                                        <span><?php $total = $total-($total*$service->discount/100); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="total" style="font-size: 24px; font-weight:700;">
                                        Total:<span style="margin: 6px; color:#0a91ed;"><?php echo e($total); ?></span>
                                        <input hidden type="text" class="form-control" id="total" name="total" value="<?php echo e($total); ?>" required>
                                    </div>
                                    <!-- <p class="text-muted">Tracking Status on: <span class="text-body">11:30pm, Today</span></p> -->
                                    <img class="align-self-center img-fluid" src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" width="50">
                                </div>
                                <!-- /.pricing-card-one -->
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="booking-dash-body">
                                    <div class="pricing-card-one popular-two mt-25">
                                        <div class="row bg-white card-box border-20">
                                            <h4 class="text-dark fw-normal">Fill in the required</h4>
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Names*</label>
                                                <input type="text" class="form-control" id="names" name="names" value="<?php echo e(Auth::user()->name); ?>" required>
                                                <?php $__errorArgs = ['names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Email*</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Phone number*</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e(Auth::user()->phone); ?>" required>
                                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Location*</label>
                                                <input type="text" class="form-control" id="location" name="location" value="<?php echo e(Auth::user()->location); ?>" placeholder="House number and Street name" required>
                                                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="booking-dash-body">
                                    <div class="pricing-card-one popular-two mt-25">
                                        <div class="row bg-white card-box border-20">
                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label for="payment" class="col" value="<?php echo e(__('payment')); ?>">Select payment mode</label>
                                                <select class="col form-control" id="payment_mode" name="payment_mode">
                                                    <option value="">Select Payment Mode</option>
                                                    <option value="check-payment">Mobile money</option>
                                                    <option value="Cash-on-delivery">Cash on delivery</option>
                                                    <option value="bank-transfer">Bank transfer</option>
                                                </select>
                                                <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label>Date *</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label>Time *</label>
                                                <input type="time" class="form-control" id="time" name="time" required>
                                                <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="dash-input-wrapper">
                                                <label for="">Order Note*</label>
                                                <textarea class="form-control size-lg" cols="10" rows="4" id="notes" name="notes" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                                <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <!-- /.dash-input-wrapper -->
                                            <div class="button-group d-inline-flex align-items-center mt-30">
                                                <button type="submit" class="dash-btn-two tran3s me-3">Order Now</button>
                                            </div>
                                        </div>
                                        <!-- /.card-box -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ./pricing-section -->


    <!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
    <section class="job-portal-intro">
        <div class="container">
            <div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="text-center text-lg-start">
                            <h2>Most complete service portal.</h2>
                            <p class="text-md m0 md-pb-20">Signup and start find your service or talents.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
                            <li class="me-2"><a href="" class="btn-three">Looking for service?</a></li>
                            <li class="ms-2"><a href="" class="btn-four">Join for a service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div><!-- End .checkout -->
</div><!-- End .page-content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/services/booking.blade.php ENDPATH**/ ?>