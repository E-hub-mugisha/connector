<?php $__env->startSection('title', 'Verify Email'); ?>
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
                    <p class="text-lg text-white mt-30 lg-mt-20"><?php echo e(__('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?></p>
                </div>
            </div>

        </div>
    </div>
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->


<?php if(session('status') == 'verification-link-sent'): ?>
<div class="mb-4 font-medium text-sm text-green-600">
    <?php echo e(__('A new verification link has been sent to the email address you provided in your profile settings.')); ?>

</div>
<?php endif; ?>

<section class="registration-section position-relative pt-100 lg-pt-80 pb-150 lg-pb-80">
    <div class="container">
        <div class="user-data-form">
            <div class="text-center">
                <h2><?php echo $__env->yieldContent('title'); ?></h2>
            </div>
            <div class="form-wrapper m-auto">
                <!-- <ul class="nav nav-tabs border-0 w-100 mt-30" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Candidates</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Employer</button>
                        </li>
                    </ul> -->
                <div class="tab-content mt-40">
                    <div class="tab-pane fade show active" role="tabpanel" id="fc1">
                        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="col-12">
                                <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">
                                    <?php echo e(__('Resend Verification Email')); ?>

                                </button>
                            </div>
                        </form>

                        <div>

                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                                <?php echo csrf_field(); ?>

                                <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">
                                    <?php echo e(__('Log Out')); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>