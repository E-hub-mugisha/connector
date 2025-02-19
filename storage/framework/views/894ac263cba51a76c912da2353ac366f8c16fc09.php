<?php $__env->startSection('title','Edit Service'); ?>
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
            <form action="<?php echo e(route('admin.update_service', $service->id )); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="service_provider" value="<?php echo e(__('service_provider')); ?>">Service provider</label>
                        <select class="form-control" name="service_provider_id" id="service_provider_id">
                            <option value="<?php echo e($sprovider->id); ?>"><?php echo e($sprovider->sprovider_name); ?></option>
                            
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
                    <div class="col-md-4 form-group">
                        <label for="name" value="<?php echo e(__('name')); ?>">name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($service->name); ?>" required>
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
                        <label for="service_category" value="<?php echo e(__('service_category')); ?>">Service category</label>
                        <select class="form-control" name="service_category_id" id="service_category_id">
                            <option value="<?php echo e($service->service_category_id); ?>"><?php echo e($service->category->name); ?></option>
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
                    
                    
                    <div class="col-md-4 form-group">
                        <label for="service_category" value="<?php echo e(__('service_category')); ?>">Service sub category</label>
                        <select class="form-control" name="sub_category" id="sub_category">
                            <option value="<?php echo e($service->sub_category_id); ?>"><?php echo e($service->subcategory->name); ?></option>
                            <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
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
                    <div class="col-md-4 form-group">
                        <label>Duration *</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="<?php echo e($service->duration); ?>" required>
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
                        <label for="price" value="<?php echo e(__('price')); ?>">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo e($service->price); ?>" required>
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
                        <input type="text" class="form-control" id="discount" name="discount" value="<?php echo e($service->discount); ?>">
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
                        <select class="form-control" name="discount_type">
                            <option value="<?php echo e($service->discount_type); ?>"><?php echo e($service->discount_type); ?></option>
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

                    <div class="col-md-4 form-group">
                        <label for="featured" value="<?php echo e(__('featured')); ?>">featured</label>
                        <select class="form-control" name="featured">
                            <option value="<?php echo e($service->featured); ?>"><?php echo e($service->featured); ?></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="location" value="<?php echo e(__('location')); ?>">location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo e($service->location); ?>">
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
                        <label for="description" value="<?php echo e(__('description')); ?>">description</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo e($service->description); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="inclusion" value="<?php echo e(__('inclusion')); ?>">Inclusion</label>
                        <textarea class="form-control" id="inclusion" name="inclusion" required><?php echo e($service->inclusion); ?></textarea>
                        <?php $__errorArgs = ['inclusion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="exclusion" value="<?php echo e(__('exclusion')); ?>">Exclusion</label>
                        <textarea class="form-control" id="exclusion" name="exclusion" required><?php echo e($service->exclusion); ?></textarea>
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
                        <input type="file" class="form-control" id="image" name="image">
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <img src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($service->image); ?>" width="60" />
                    </div><!-- End .form-group -->
                    <div class="form-group">
                        <label for="thumbnail" value="<?php echo e(__('thumbnail')); ?>">thumbnail</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" width="60" />

                    </div><!-- End .form-group -->
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="text">Update Service</span>
                    </button>
                </div><!-- End .form-footer -->

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/services/edit.blade.php ENDPATH**/ ?>