<?php $__env->startSection('title','Edit Service Category'); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Service category</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('admin.update_service_category', $scategory->id )); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" value="<?php echo e(__('Category name')); ?>">Category name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($scategory->name); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-group col-md-6">
                            <label for="featured" value="<?php echo e(__('featured')); ?>">featured</label>
                            <select class="form-control" name="featured" id="featured">
                                <option value="<?php echo e($scategory->featured); ?>"><?php echo e($scategory->featured); ?></option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-group col-md-6">
                            <label for="image" value="<?php echo e(__('Category image')); ?>">Category image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Service category</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/service-category/edit.blade.php ENDPATH**/ ?>