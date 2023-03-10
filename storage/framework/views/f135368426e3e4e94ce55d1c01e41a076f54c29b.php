<div>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Service Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Add Service.</h6>
                    </div>
                    <div class="card-body">

                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                        <?php endif; ?>
                        <form wire:submit.prevent="createService">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="name" value="<?php echo e(__('name')); ?>">name *</label>
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

                                <div class="col-md-4 form-group">
                                    <label for="slug" value="<?php echo e(__('slug')); ?>">Slug</label>
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
                                <div class="col-md-4 form-group">
                                    <label for="tagline" value="<?php echo e(__('tagline')); ?>">Tagline</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline" wire:model="tagline" required>
                                    <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label>Duration *</label>
                                    <input type="text" class="form-control" id="duration" name="duration" wire:model="duration" required>
                                    <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="location" value="<?php echo e(__('location')); ?>">location</label>
                                    <input type="text" class="form-control" id="location" name="location" wire:model="location">
                                    <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="service_category" value="<?php echo e(__('service_category')); ?>">Service category</label>
                                    <select class="form-control" wire:model="service_category_id">
                                        <option value="">Select service category</option>

                                        <option value="<?php echo e($sprovider->category->id); ?>"><?php echo e($sprovider->category->name); ?></option>

                                    </select>
                                    <?php $__errorArgs = ['service_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="price" value="<?php echo e(__('price')); ?>">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" wire:model="price" required>
                                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="discount" value="<?php echo e(__('discount')); ?>">Discount</label>
                                    <input type="text" class="form-control" id="discount" name="discount" wire:model="discount">
                                    <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->

                                <div class="col-md-4 form-group">
                                    <label for="discount type" value="<?php echo e(__('discount type')); ?>">Discount type</label>
                                    <select class="form-control" wire:model="discount_type">
                                        <option value="">Select type</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    <?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-12 form-group">
                                    <label for="description" value="<?php echo e(__('description')); ?>">description</label>
                                    <textarea class="form-control" id="description" name="description" wire:model="description" required></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="inclusion" value="<?php echo e(__('inclusion')); ?>">Inclusion</label>
                                    <textarea class="form-control" id="inclusion" name="inclusion" wire:model="inclusion" required></textarea>
                                    <?php $__errorArgs = ['inclusion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="exclusion" value="<?php echo e(__('exclusion')); ?>">Exclusion</label>
                                    <textarea class="form-control" id="exclusion" name="exclusion" wire:model="exclusion" required></textarea>
                                    <?php $__errorArgs = ['exclusion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="image" value="<?php echo e(__('image')); ?>">image</label>
                                    <input type="file" class="form-control" id="image" name="image" wire:model="image" required>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($image): ?>
                                    <img src="<?php echo e($image->temporaryUrl()); ?>" width="60" />
                                    <?php endif; ?>
                                </div><!-- End .form-group -->
                                <div class="col-md-6 form-group">
                                    <label for="thumbnail" value="<?php echo e(__('thumbnail')); ?>">thumbnail</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" wire:model="thumbnail" required>
                                    <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($thumbnail): ?>
                                    <img src="<?php echo e($thumbnail->temporaryUrl()); ?>" width="60" />
                                    <?php endif; ?>
                                </div><!-- End .form-group -->
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <span>Add Service</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/add-service-component.blade.php ENDPATH**/ ?>