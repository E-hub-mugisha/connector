
<?php $__env->startSection('title','Edit Profile'); ?>
<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="bg-white card-box border-20 mt-40">
            <h4 class="dash-title-three">Edit Profile</h4>
            <div class="row">
                <form action="<?php echo e(route('profile.update', $user->id)); ?> }}" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo e($user->address); ?>">
                    </div>
                    <div class="button-group d-inline-flex align-items-center mt-30">
                        <button type="submit" class="dash-btn-two tran3s me-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/customer-profile-edit.blade.php ENDPATH**/ ?>