
<?php $__env->startSection('title', 'Edit account'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card container mb-3" style="border-radius: .5rem;">

                <h2 class="main-title mt-3">Edit Account</h2>

                <div class="bg-white card-box border-20">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('ServiceProvider.updateProfile',$sprovider->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row ">
                            <div class="col-md-10 dash-input-wrapper mb-30 form-group">
                                <div class="col-md-3 dash-btn-one d-inline-block position-relative me-3">
                                    <?php if($sprovider->image): ?>
                                    <img src="<?php echo e(asset('image/profile')); ?>/<?php echo e($sprovider->image); ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3 dash-btn-one d-inline-block position-relative me-3">
                                    <i class="bi bi-plus"></i>
                                    Upload Profile
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                    <?php $__errorArgs = ['image'];
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
                        </div>
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="about" class="control-label">About: </label>
                            <textarea class="form-control" id="about" name="about" required><?php echo e($sprovider->about); ?></textarea>
                            <?php $__errorArgs = ['about'];
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
                        <div class="row">
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="skills" class="control-label">skills: </label>
                            <textarea class="form-control" id="skills" name="skills" required><?php echo e($sprovider->skills); ?></textarea>
                            <?php $__errorArgs = ['skills'];
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
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="qualification" class="control-label">qualification: </label>
                            <textarea class="form-control" id="qualification" name="qualification" required><?php echo e($sprovider->qualification); ?></textarea>
                            <?php $__errorArgs = ['qualification'];
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
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="experience" class="control-label">experience: </label>
                            <textarea class="form-control" id="experience" name="experience" required><?php echo e($sprovider->experience); ?></textarea>
                            <?php $__errorArgs = ['experience'];
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
                        <div class="row">

                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="city" class="control-label">city: </label>
                                <input type="text" class="form-control" name="city" value="<?php echo e($sprovider->city); ?>" required>
                                <?php $__errorArgs = ['city'];
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
                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="service_category_id" class="control-label">Service Category: </label>

                                <select name="service_category_id" class="nice-select form-control" wire:model="service_category_id" required>
                                    <?php if($sprovider->service_category_id): ?>
                                    <option value="<?php echo e($sprovider->category); ?>"><?php echo e($sprovider->category->name); ?></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($scategory->id); ?>"><?php echo e($scategory->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['service_category_id'];
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
                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="service_location" class="control-label">Service Locations</label>

                                <input type="text" class="form-control" name="service_locations" value="<?php echo e($sprovider->service_locations); ?>" required>
                                <?php $__errorArgs = ['service_locations'];
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
                            <label for="" class="control-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('about');
    CKEDITOR.replace('skills');
    CKEDITOR.replace('qualification');
    CKEDITOR.replace('experience');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/account/edit.blade.php ENDPATH**/ ?>