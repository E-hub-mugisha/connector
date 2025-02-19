<?php $__env->startSection('title','Edit Sliders'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Slider</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.update_slider', $slider->id )); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="title" value="<?php echo e(__('slider title')); ?>">slider title *</label>
                                <input type="text" class="form-control" id="title" name="title" required value="<?php echo e($slider->title); ?>">
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="status" value="<?php echo e(__('status')); ?>">status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="<?php echo e($slider->status); ?>"><?php echo e($slider->status); ?></option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="image" value="<?php echo e(__('slider image')); ?>">slider image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Update Slider</span>
                                </button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/sliders/edit.blade.php ENDPATH**/ ?>