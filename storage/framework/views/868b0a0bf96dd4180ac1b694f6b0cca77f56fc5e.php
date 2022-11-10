<div>
    <div class="row justify-content-center">
        <div class="col-md-8 az-content-body d-flex flex-column">
            <div class="card mb-8">
                <div class="card-header">
                    <h2 class="az-content-title">Add Service</h2>
                </div>
                <div class="card-body">

                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form wire:submit.prevent="updateService">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="service_provider_id" wire:model="service_provider_id" value="<?php echo e($service_provider_id); ?>">
                                <?php $__errorArgs = ['service_provider_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            

                        </div>
                        <div class="form-group">
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

                        <div class="form-group">
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
                        <div class="form-group">
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

                        <div class="form-group">
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
                        <div class="form-group">
                            <label>Duration *</label>
                            <input type="time" class="form-control" id="duration" name="duration" wire:model="duration" required>
                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="discount type" value="<?php echo e(__('discount type')); ?>">Discount type</label>
                            <select class="form-control" wire:model="discount_type">
                                <option value="">Select service category</option>
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

                        <div class="form-group">
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

                        <div class="form-group">
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

                        <div class="form-group">
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

                        <div class="form-group">
                            <label for="newimage" value="<?php echo e(__('image')); ?>">image</label>
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
                            <img src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($image); ?>" width="60" />
                            <?php endif; ?>
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="<?php echo e(__('thumbnail')); ?>">thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" wire:model="newthumbnail">
                            <?php $__errorArgs = ['newthumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($newthumbnail): ?>
                            <img src="<?php echo e($newthumbnail->temporaryUrl()); ?>" width="60" />
                            <?php else: ?>
                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($image); ?>" width="60" />
                            <?php endif; ?>
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span>update Service</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div>
    </div>
</div><?php /**PATH D:\hile\hiletasker\resources\views/livewire/sprovider/edit-provider-services-component.blade.php ENDPATH**/ ?>