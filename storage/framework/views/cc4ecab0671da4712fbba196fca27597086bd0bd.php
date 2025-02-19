<?php $__env->startSection('title', 'Register'); ?>
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
                            <h2 class="text-white">Register</h2>
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
                    <h2>Create Account</h2>
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
                            <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-25">
                                            <label>Name*</label>
                                            <input id="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            <?php $__errorArgs = ['name'];
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
                                        <div class="input-group-meta position-relative mb-25">
                                            <label>Email*</label>
                                            <input id="email" class=" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

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
                                        <div class="input-group-meta position-relative mb-25">
                                            <label for="phone" value="<?php echo e(__('phone')); ?>">Your phone</label>
                                            <input id="phone" class="<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" required>

                                            <?php $__errorArgs = ['phone'];
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
                                        <div class="input-group-meta position-relative mb-25">
                                            <label for="utype" value="<?php echo e(__('Register as')); ?>">Register as</label>
                                            <select id="registeras" class="form-control <?php $__errorArgs = ['registeras'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-valid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="registeras" required>
                                                <option value="CST">Customer</option>
                                                <option value="SVP">Service Provider</option>
                                                <?php $__errorArgs = ['registeras'];
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-20">
                                            <label for="password" value="<?php echo e(__('Password')); ?>">Your Password</label>
                                            <input type="password" id="password" class=" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

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
                                        <div class="input-group-meta position-relative mb-20">
                                            <label for="password_confirmation" value="<?php echo e(__('Confirm Password')); ?>">Confirm Password</label>
                                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                            <div>
                                                <input type="checkbox" id="remember_me" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                                <label for="remember">By hitting the "Register" button, you agree to the <a href="<?php echo e(route('terms')); ?>">Terms conditions</a> & <a href="<?php echo e(route('policy')); ?>">Privacy Policy</a></label>
                                            </div>
                                        </div> <!-- /.agreement-checkbox -->
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane fade" role="tabpanel" id="fc2">
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-25">
                                            <label>Name*</label>
                                            <input type="text" placeholder="Zubayer Hasan">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-25">
                                            <label>Email*</label>
                                            <input type="email" placeholder="zubayerhasan@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-20">
                                            <label>Password*</label>
                                            <input type="password" placeholder="Enter Password" class="pass_log_id">
                                            <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_60.svg" alt=""></span></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                            <div>
                                                <input type="checkbox" id="remember">
                                                <label for="remember">By hitting the "Register" button, you agree to the <a href="#">Terms conditions</a> & <a href="#">Privacy Policy</a></label>
                                            </div>
                                        </div> <!-- /.agreement-checkbox -->
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-eleven fw-500 tran3s d-block mt-20">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>

                    <div class="d-flex align-items-center mt-30 mb-10">
                        <div class="line"></div>
                        <span class="pe-3 ps-3">OR</span>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="images/icon/google.png" alt="">
                                <span class="ps-2">Signup with Google</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="images/icon/facebook.png" alt="">
                                <span class="ps-2">Signup with Facebook</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-center mt-10">Have an account? <a href="#" class="fw-500" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a></p>
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/auth/register.blade.php ENDPATH**/ ?>