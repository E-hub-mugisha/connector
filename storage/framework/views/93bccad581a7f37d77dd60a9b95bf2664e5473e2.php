<div>
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active">Add Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('admin.all_services')); ?>">All Services</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">
                            <?php if(Session::has('message')): ?>
                            <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                            <?php endif; ?>
                            <form wire:submit.prevent="createService">
                                <?php echo csrf_field(); ?>

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
                                    <div class="col-sm-9">
                                        <label for="tagline" value="<?php echo e(__('tagline')); ?>"><?php echo e(Auth::user()->id); ?></label>
                                        <input type="text" class="form-control" name="service_provider_id" wire:model="service_provider_id" value="<?php echo e(Auth::user()->id); ?>">
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
                                    <label for="service_provider" value="<?php echo e(__('service_provider')); ?>">Service provider</label>
                                    <select class="form-control" wire:model="service_provider_id">
                                        <option value="">Select service provider</option>
                                        <?php $__currentLoopData = $sprovider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->sprovider_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['service_provider_id'];
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
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <div class="form-group">
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

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Add Service</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-add-service-component.blade.php ENDPATH**/ ?>