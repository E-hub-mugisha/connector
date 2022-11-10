<?php if (isset($component)) { $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BaseLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\BaseLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">

                            <form method="POST" action="<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>

                                <div>
                                    <label for="name" value="<?php echo e(__('Name')); ?>">Your Names</label>
                                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>

                                <div class="mt-4">
                                    <label for="email" value="<?php echo e(__('Email')); ?>">Your Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                </div>

                                <div class="mt-4">
                                    <label for="phone" value="<?php echo e(__('phone')); ?>">Your phone</label>
                                    <input id="phone" class="form-control" type="text" name="phone" required />
                                </div>

                                <div class="mt-4">
                                    <label for="utype" value="<?php echo e(__('Register as')); ?>">Register as</label>
                                    <select id="registeras" class="form-control" name="registeras">
                                        <option value="CST">Customer</option>
                                        <option value="SVP">Service Provider</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="password" value="<?php echo e(__('Password')); ?>">Your Password</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <label for="password_confirmation" value="<?php echo e(__('Confirm Password')); ?>">Confirm Password</label>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <?php if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()): ?>
                                <div class="mt-4">
                                    <label for="terms">
                                        <div class="flex items-center">
                                            <checkbox name="terms" id="terms" />

                                            <div class="ml-2">
                                                <?php echo __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]); ?>

                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <?php endif; ?>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('login')); ?>">
                                        <?php echo e(__('Already registered?')); ?>

                                    </a>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Sign Up</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                            
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a)): ?>
<?php $component = $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a; ?>
<?php unset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a); ?>
<?php endif; ?><?php /**PATH D:\hile\hiletasker\resources\views/auth/register.blade.php ENDPATH**/ ?>