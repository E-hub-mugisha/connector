
<?php $__env->startSection('title','Service Details'); ?>
<?php $__env->startSection('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><?php echo $__env->yieldContent('title'); ?></h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Grow In Utility -->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e($service->name); ?> Service Information</h6>
                    <p><?php echo e($service->category->name); ?></p>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo e(asset('assets/img/undraw_posting_photo.svg')); ?>" alt="">
                    </div>
                    <p><?php echo e($service->description); ?></p>
                    <h4>Inclusion</h4>
                    <?php $__currentLoopData = explode("|",$service->inclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($inclusion); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <h4>Exclusion</h4>
                    <?php $__currentLoopData = explode("|",$service->exclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($exclusion); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>

        <!-- Fade In Utility -->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Others Information</h6>
                </div>
                <div class="card-body">
                    <div class="small mb-1">Location:<span><?php echo e($service->location); ?></span></div>
                    <span>Price:</span>
                    <div>
                        <?php
                        $total = $service->price;
                        ?>
                        <?php if($service->discount): ?>
                        <?php if($service->discount_type == 'fixed'): ?>
                        <div class="discount-fix">
                            Discount:<span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?></span>
                        </div>
                        <div class="discount-fix-total">
                            <span><?php $total = $total-$service->discount; ?></span>
                        </div>
                        <?php elseif($service->discount_type == 'percent'): ?>
                        <div class="discount-per">
                            Discount:<span style="margin: 6px; color:#ff1e00;"><?php echo e($service->discount); ?>%</span>
                        </div>
                        <div class="discount-per-total" style="margin:6px;">
                            <span><?php $total = $total-($total*$service->discount/100); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="total">
                            Total:<span style="margin: 6px;"><?php echo e($total); ?></span>
                        </div>
                    </div>
                    <div class="small mb-1">View on map:</div>
                    <div class="gmap_canvas h-100 w-100">
                        <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=<?php echo e($service->location); ?>&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/services/show.blade.php ENDPATH**/ ?>