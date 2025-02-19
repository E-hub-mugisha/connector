<?php $__env->startSection('title', 'Account'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">

        <div class="col-md-10 d-flex justify-content-center align-items-center grid-margin stretch-card">
            <div class="card container mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <?php if($sprovider->image): ?>
                        <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sprovider->image); ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                        <?php endif; ?>
                        <h5><?php echo e(Auth::user()->name); ?></h5>
                        <h5>About</h5>
                        <p class="mb-3"><?php echo $sprovider->about; ?></p>
                        <i class="far fa-edit mb-5"></i>
                        <h5>Skills</h5>
                        <p class="mb-3"><?php echo $sprovider->skills; ?></p>
                        <i class="far fa-edit mb-5"></i>
                        <h5>Qualification</h5>
                        <p class="mb-3"><?php echo $sprovider->qualification; ?></p>
                        <i class="far fa-edit mb-5"></i>
                        <h5>Experience</h5>
                        <p class="mb-3"><?php echo $sprovider->experience; ?></p>
                        <i class="far fa-edit mb-5"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">

                            <h6>Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted"><?php echo e(Auth::user()->email); ?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Phone</h6>
                                    <p class="text-muted"><?php echo e(Auth::user()->phone); ?></p>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>City</h6>
                                    <p class="text-muted"><?php echo e($sprovider->city); ?></p>
                                </div>

                            </div>
                            <h6>Projects</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Service category</h6>
                                    <p class="text-muted">
                                        <?php if($sprovider->service_category_id): ?>
                                        <?php echo e($sprovider->category->name); ?>

                                        <?php endif; ?>
                                    </p>

                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Service location</h6>
                                    <p class="text-muted"><?php echo e($sprovider->service_locations); ?></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                            </div>

                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                    <a href="<?php echo e(route('sprovider.edit_profile')); ?>" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-pencil"></i>Edit Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/account/index.blade.php ENDPATH**/ ?>