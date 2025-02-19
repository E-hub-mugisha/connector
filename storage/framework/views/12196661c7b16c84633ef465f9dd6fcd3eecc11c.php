<?php $__env->startSection('title', 'Login'); ?>
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
                            <h2 class="text-white">Hi, Welcome Back!</h2>
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
                    <h2>Hi, Welcome Back!</h2>
                    <p>Still don't have an account? <a href="<?php echo e(route('register')); ?>">Sign up</a></p>
                </div>
                <div class="form-wrapper m-auto">
                    <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-10">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group-meta position-relative mb-25">
                                    <label>Email*</label>
                                    <input type="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" required :value="old('email')" required autofocus>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta position-relative mb-20">
                                    <label>Password*</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" required autocomplete="current-password" required autofocus>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" id="remember_me" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label for="remember">Keep me logged in</label>
                                    </div>
                                    <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot your password?')); ?>

                                    </a>
                                    <?php endif; ?>
                                </div> <!-- /.agreement-checkbox -->
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex align-items-center mt-30 mb-10">
                        <div class="line"></div>
                        <span class="pe-3 ps-3">OR</span>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="<?php echo e(asset('asset/images/icon/google.png')); ?>" alt="">
                                <span class="ps-2">Login with Google</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="<?php echo e(asset('asset/images/icon/facebook.png')); ?>" alt="">
                                <span class="ps-2">Login with Facebook</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-center mt-10">Don't have an account? <a href="<?php echo e(route('register')); ?>" class="fw-500">Sign up</a></p>
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/auth/login.blade.php ENDPATH**/ ?>