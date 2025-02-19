
<?php $__env->startSection('title','Create Service Provider'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $__env->yieldContent('title'); ?> </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <?php if(Session::has('message')): ?>
            <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <form action="<?php echo e(route('ServiceProviderAdd' )); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" value="<?php echo e(__('name')); ?>">Names *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="email" value="<?php echo e(__('name')); ?>">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="phone" value="<?php echo e(__('phone')); ?>">Phone *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="password" value="<?php echo e(__('password')); ?>">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="text">Add Service Provider</span>
                    </button>
                </div><!-- End .form-footer -->

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/service-provider/create.blade.php ENDPATH**/ ?>