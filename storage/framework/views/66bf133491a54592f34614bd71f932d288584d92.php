
<?php $__env->startSection('title','Service Provider'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="container">
            <div class="row" style="border-radius: 16px;">
                <div class="well col-md-6 profile">
                    <figure>
                        <?php if($UserProvide->image): ?>
                        <img src="<?php echo e(asset('image/profile')); ?>/<?php echo e($UserProvide->image); ?>" alt="<?php echo e($UserProvide->user->name); ?>" class="img-circle" style="width:75px;" id="user-img">
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($UserProvide->user->name); ?>" class="img-circle" style="width:75px;" id="user-img">
                        <?php endif; ?>
                    </figure>
                    <h5><strong id="user-name"><?php echo e($UserProvide->sprovider_name); ?></strong></h5>
                    <p style="font-size: smaller;" id="user-frid"><?php echo e($UserProvide->user->phone); ?>  </p>
                    <p style="font-size: smaller;overflow-wrap: break-word;" id="user-email"><?php echo e($UserProvide->proEmail); ?>  </p>
                    <p style="font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status"><?php echo e($UserProvide->status); ?></span></p>
                    <div class="divider text-center"></div>
                    <p style="font-size: smaller;"><strong>Service Category</strong></p>
                    <p style="font-size: smaller;" id="user-role"><?php echo e($UserProvide->category->name); ?> </p>
                    <div class="divider text-center"></div>
                    <div class="col-lg-12 left" style="overflow-wrap: break-word;">
                        <h4>
                            <p><strong id="user-globe-rank">Address </strong></p>
                        </h4>
                        <p><small class="label label-success"><?php echo e($UserProvide->service_locations); ?> </small></p>
                        <!--<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
                    </div>
                    <div class=" col-lg-12 left" style="overflow-wrap: break-word;">
                        <h4>
                            <p><strong id="user-college-rank">About </strong></p>
                        </h4>
                        <p> <small class="label label-warning"><?php echo e($UserProvide->about); ?> </small></p>
                        <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
                    </div>
                </div>
                <div class="well col-md-6 profile">
                    <h5><strong id="user-name">Services</strong></h5>
                    <?php if($services): ?>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span style="font-size: smaller;" id="user-frid"><?php echo e($service->name); ?> </span>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <span style="font-size: smaller;" id="user-frid">No services available</span>
                    <?php endif; ?>
                    <div class="divider text-center"></div>
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=<?php echo e($UserProvide->city); ?>&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5><strong id="user-name">Reviews</strong></h5>
                    <?php if($reviews): ?>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="font-size: smaller;" id="user-frid"><?php echo e($review->comment); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <li style="font-size: smaller;" id="user-frid">No reviews available</li>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/service-provider/show.blade.php ENDPATH**/ ?>