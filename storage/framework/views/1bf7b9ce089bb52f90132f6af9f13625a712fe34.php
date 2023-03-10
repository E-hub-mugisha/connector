<div>
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
                    <form wire:submit.prevent="updateServiceCategory">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name" value="<?php echo e(__('Category name')); ?>">Category name *</label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="slug" value="<?php echo e(__('Category slug')); ?>">Category Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                            <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="featured" value="<?php echo e(__('featured')); ?>">featured</label>
                            <select class="form-control" wire:model="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="<?php echo e(__('Category image')); ?>">Category image</label>
                            <input type="file" class="form-control" id="image" name="image" wire:model="newimage">
                            <?php $__errorArgs = ['newimage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($newimage): ?>
                            <img src="<?php echo e($newimage->temporaryUrl()); ?>" width="60" />
                            <?php else: ?>
                            <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($image); ?>" width="60" />
                            <?php endif; ?>
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Service category</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-edit-service-category-component.blade.php ENDPATH**/ ?>