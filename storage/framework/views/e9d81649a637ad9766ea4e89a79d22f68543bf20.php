
<?php $__env->startSection('title', 'Service Detail'); ?>
<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e($details->name); ?></h4>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote blockquote-primary">
                        <footer class="blockquote-footer">About this service</footer>
                        <p><?php echo e($details->description); ?></p>

                    </blockquote>

                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Address</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p>
                                    <?php echo e($details->location); ?>

                                </p>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Image</h4>
                    <div class="media">
                        <div class="media-body">
                            <img src="<?php echo e($details->image); ?>" alt="<?php echo e($details->name); ?>" width="100px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <h4 class="card-title">List of inclusion</h4>
                            <?php $__currentLoopData = explode("|",$details->inclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($inclusion); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <h4 class="card-title">Exclusion</h4>
                            <p class="card-description">List of exclude service</p>
                            <?php $__currentLoopData = explode("|",$details->exclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($exclusion); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="template-demo">
                        <a href="<?php echo e(route('CustomerService.book', $details->slug)); ?>" type="button"
                            class="btn btn-primary btn-rounded btn-fw">Book Service</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/services/show.blade.php ENDPATH**/ ?>