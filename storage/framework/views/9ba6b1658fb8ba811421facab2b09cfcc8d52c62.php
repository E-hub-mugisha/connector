<div>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="card col-md-8 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <div class="card-body">
                    <form class="form-horizontal" wire:submit.prevent="updateProfile">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-center">
                            <div class="col-md-6 form-group">
                                <label for="image" class="control-label">Profile Image: </label>
                                <input type="file" class="form-control-file" id="image" name="image" wire:model="newimage" required>
                                <?php $__errorArgs = ['newimage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php if($newimage): ?>
                                <img src="<?php echo e($newimage->temporaryUrl()); ?>" width="220" />
                                <?php elseif($image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($image); ?>" width="220" />
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" width="220" />
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about" class="control-label">About: </label>
                            <textarea class="form-control" name="about" wire:model="about" required></textarea>
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
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label ">PassPort/ID </label>

                                <input type="file" class="form-control-file" id="nid" name="nid" wire:model="nid">
                                <?php $__errorArgs = ['nid'];
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
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label">Education certificate </label>

                                <input type="file" class="form-control-file" id="certificate" name="certificate" wire:model="certificate">
                                <?php $__errorArgs = ['certificate'];
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
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label">Criminal record </label>

                                <input type="file" class="form-control-file" id="criminal_record" name="criminal_record" wire:model="criminal_record">
                                <?php $__errorArgs = ['criminal_record'];
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

                            <div class="col-md-4 form-group">
                                <label for="city" class="control-label">city: </label>
                                <input type="text" class="form-control" name="city" wire:model="city" required>
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
                            <div class="col-md-4 form-group">
                                <label for="service_category_id" class="control-label">Service Category: </label>

                                <select name="service_category_id" class="form-control" wire:model="service_category_id" required>
                                    <option value="">select service category</option>
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
                            <div class="col-md-4 form-group">
                                <label for="service_location" class="control-label">Service Locations Zipcode/Pincode: </label>

                                <input type="text" class="form-control" name="service_locations" wire:model="service_locations" required>
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
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/edit-sprovider-profile-component.blade.php ENDPATH**/ ?>