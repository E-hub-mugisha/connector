<?php $__env->startSection('title', 'Booking'); ?>

<?php $__env->startSection('content'); ?>
<div>
    <!-- Inner Banner (No changes) -->

    <!-- Pricing Section -->
    <section class="pricing-section bg-color pt-100 lg-pt-70 pb-90 lg-pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 m-auto">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('bookings.store')); ?>" method="POST" enctype="multipart/form-data" id="bookingForm">
                        <?php echo csrf_field(); ?>

                        <!-- Step 1: Service and User Info -->
                        <div class="step" id="step1">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-5">
                                    <div class="pricing-card-one border-0 mt-25">
                                        <!-- Service Name and Provider Info -->
                                        <div style="font-size: 24px; font-weight:700;">
                                            <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;"> Service Name: <span class="text-muted mb-2"><?php echo e($service->name); ?></span></p>
                                            <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Category: <span class="text-muted mb-2"><?php echo e($service->category->name); ?></span></p>
                                        </div>
                                        <hr />
                                        <div style="font-size: 24px; font-weight:700;">
                                            <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Provider Name: <span class="text-muted mb-2"><?php echo e($service->provider->sprovider_name); ?></span></p>
                                            <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Provider Email: <span class="text-muted mb-2"><?php echo e($service->provider->proEmail); ?></span></p>
                                        </div><input type="text" class="form-control" id="proEmail" name="proEmail" value="<?php echo e($service->provider->proEmail); ?>" required>
                                        <input type="text" class="form-control" id="service_provider_id" name="service_provider_id" value="<?php echo e($service->service_provider_id); ?>" required>
                                        <input hidden type="text" class="form-control" id="service_id" name="service_id" value="<?php echo e($service->id); ?>" required>
                                        <?php
                                        $total = $service->price;
                                        ?>
                                        <?php if($service->discount): ?>
                                        <?php if($service->discount_type == 'fixed'): ?>
                                        <div class="discount-fix">
                                            Discount: <span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?></span>
                                        </div>
                                        <div class="discount-fix-total">
                                            <span><?php $total = $total - $service->discount; ?></span>
                                        </div>
                                        <?php elseif($service->discount_type == 'percent'): ?>
                                        <div class="discount-per">
                                            Discount: <span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?>%</span>
                                        </div>
                                        <div class="discount-per-total" style="margin: 6px;">
                                            <span><?php $total = $total - ($total * $service->discount / 100); ?></span>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="total" style="font-size: 24px; font-weight:700;">
                                            Total: <span style="margin: 6px; color:#0a91ed;"><?php echo e($total); ?></span>
                                            <input hidden type="text" class="form-control" id="total" name="total" value="<?php echo e($total); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <div class="booking-dash-body">
                                        <div class="pricing-card-one popular-two mt-25">
                                            <!-- User Info Inputs -->
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="names">Names*</label>
                                                <input type="text" class="form-control" id="names" name="names" value="<?php echo e(Auth::user()->name); ?>" required>
                                            </div>
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="email">Email*</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>" required>
                                            </div>
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="phone">Phone number*</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e(Auth::user()->phone); ?>" required>
                                            </div>
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="location">Location*</label>
                                                <input type="text" class="form-control" id="location" name="location" value="<?php echo e(Auth::user()->location); ?>" placeholder="House number and Street name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="nextToStep2">Next</button>
                        </div>

                        <!-- Step 2: Payment, Date, Time, and Notes -->
                        <div class="step" id="step2" style="display:none;">
                            <div class="row">
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="payment_mode">Select payment mode</label>
                                    <select class="form-control" id="payment_mode" name="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="check-payment">Mobile money</option>
                                        <option value="Cash-on-delivery">Cash on delivery</option>
                                        <option value="bank-transfer">Bank transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="date">Date *</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="time">Time *</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                                <div class="col-md-12 dash-input-wrapper mb-30">
                                    <label for="notes">Order Note*</label>
                                    <textarea class="form-control size-lg" cols="10" rows="4" id="notes" name="notes" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="backToStep1">Back</button>
                            <button type="button" class="btn btn-primary" id="nextToStep3">Next</button>
                        </div>

                        <!-- Step 3: Confirmation and Staff Selection -->
                        <div class="step" id="step3" style="display:none;">
                            <div class="row">
                                <div class="col-md-6 dash-input-wrapper mb-30">
                                    <label for="staff_id">Select Staff</label>
                                    <select class="form-control" id="staff_id" name="staff_id">
                                        <option value="">Select Staff</option>
                                        <?php $__currentLoopData = $staffMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="backToStep2">Back</button>
                            <button type="button" class="btn btn-primary" id="previewBooking">Preview</button>
                        </div>

                        <!-- Preview Step -->
                        <div class="step" id="preview" style="display:none;">
                            <h4>Preview Your Booking</h4>
                            <div id="previewDetails"></div>
                            <button type="button" class="btn btn-secondary" id="backToStep3">Back</button>
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById("nextToStep2").addEventListener("click", function() {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    });

    document.getElementById("backToStep1").addEventListener("click", function() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
    });

    document.getElementById("nextToStep3").addEventListener("click", function() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step3").style.display = "block";
    });

    document.getElementById("backToStep2").addEventListener("click", function() {
        document.getElementById("step3").style.display = "none";
        document.getElementById("step2").style.display = "block";
    });

    document.getElementById("previewBooking").addEventListener("click", function() {
        var names = document.getElementById("names").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var location = document.getElementById("location").value;
        var paymentMode = document.getElementById("payment_mode").value;
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;
        var notes = document.getElementById("notes").value;
        var staff = document.getElementById("staff_id").value;

        var previewDetails = `
            <p><strong>Name:</strong> ${names}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Phone:</strong> ${phone}</p>
            <p><strong>Location:</strong> ${location}</p>
            <p><strong>Payment Mode:</strong> ${paymentMode}</p>
            <p><strong>Date:</strong> ${date}</p>
            <p><strong>Time:</strong> ${time}</p>
            <p><strong>Notes:</strong> ${notes}</p>
            <p><strong>Selected Staff:</strong> ${staff}</p>
        `;

        document.getElementById("previewDetails").innerHTML = previewDetails;
        document.getElementById("step3").style.display = "none";
        document.getElementById("preview").style.display = "block";
    });

    document.getElementById("backToStep3").addEventListener("click", function() {
        document.getElementById("preview").style.display = "none";
        document.getElementById("step3").style.display = "block";
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/services/booking.blade.php ENDPATH**/ ?>