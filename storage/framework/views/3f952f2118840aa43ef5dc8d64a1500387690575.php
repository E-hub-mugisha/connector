<?php $__env->startSection('title', 'Forgot Password'); ?>
<?php $__env->startSection('content'); ?>
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
                            <h2 class="text-white"><?php echo $__env->yieldContent('title'); ?></h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20">Create an account & Start posting or hiring talents</p>
                    </div>
                </div>

            </div>
        </div>
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->



    <!-- 
		=============================================
			Registration Section
		============================================== 
		-->
    <section class="registration-section position-relative pt-100 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="user-data-form">
                <div class="text-center">
                    <h2>Forgot Password</h2>
                </div>
                <div class="form-wrapper m-auto">
                    <?php if(session('status')): ?>
                    <div class="mb-4 font-medium text-sm text-green-600">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="tab-content mt-40">
                        <div class="tab-pane fade show active" role="tabpanel" id="fc1">
                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-25">
                                            <label for="email" value="<?php echo e(__('Email')); ?>">Email address *</label>
                                            <input type="text" id="email" name="email" required :value="old('email')" required autofocus>
                                        </div><!-- End .form-group -->
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Send Reset Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </section>
    <!-- ./registration-section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>