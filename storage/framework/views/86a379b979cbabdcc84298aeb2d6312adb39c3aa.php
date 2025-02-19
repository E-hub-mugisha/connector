
<?php $__env->startSection('title', 'Service Detail'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
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
                    <h4 class="card-title">List of inclusion</h4>
                    <ul class="list-ticked">
                        <?php $__currentLoopData = explode("|",$details->inclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($inclusion); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <h4 class="card-title">Exclusion</h4>
                    <p class="card-description">List of exclude service</p>
                    <ul class="list-arrow">
                        <?php $__currentLoopData = explode("|",$details->exclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($exclusion); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
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
                                <p class="fw-bold">Location</p>
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
                            <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($details->image); ?>" alt="<?php echo e($details->name); ?>" width="100px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">More Action</h4>
                    <div class="template-demo">
                        <a href="<?php echo e(route('serviceProvider.edit', $details->id)); ?>" type="button" class="btn btn-primary btn-rounded btn-fw">Edit Service</a>
                        <form id="delete-form" action="<?php echo e(route('serviceProvider.destroy', $details->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to delete this service?')">
                                <i class="mdi mdi-delete"> </i>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/services/show.blade.php ENDPATH**/ ?>