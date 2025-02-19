<?php $__env->startSection('title', 'Service Details'); ?>
<?php $__env->startSection('content'); ?>
<!-- =============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="candidate-profile-card list-layout">
            <div class="d-flex align-items-start align-items-xl-center">
                <div class="cadidate-avatar position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="" class="lazy-img rounded-circle"></a></div>
                <div class="right-side">
                    <div class="row gx-1 align-items-center">
                        <div class="col-xl-2 order-xl-0">
                            <div class="position-relative">
                                <h4 class="candidate-name text-white mb-0"><?php echo e($service->name); ?></h4>
                                <div class="candidate-post"><?php echo e($service->category->name); ?></div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 order-xl-1">
                            <div class="candidate-info">
                                <span>Location</span>
                                <div><?php echo e($service->location); ?></div>
                                <span style="margin: 6px;">Duration:<?php echo e($service->duration); ?></span>
                            </div>
                            <!-- /.candidate-info -->
                        </div>
                        <div class="col-xl-2 col-md-4 order-xl-2">
                            <div class="candidate-info">
                                <span style="margin: 6px;">Original Price:<?php echo e($service->price); ?></span>
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
                                        Total Price:<span style="margin: 6px;"><?php echo e($total); ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.candidate-info -->
                        </div>
                        <div class="col-xl-3 col-md-4 order-xl-4">
                            <div class="d-flex justify-content-md-end">
                                <a href="#" class="save-btn text-center rounded-circle tran3s"><i class="bi bi-heart"></i></a>
                                <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="cv-download-btn fw-500 tran3s ms-md-3 sm-mt-20">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<!-- 
		=============================================
			Candidates Profile Details
		============================================== 
		-->
<section class="candidates-profile pt-100 lg-pt-70 pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                    <div class="cadidate-bio bg-wrapper bg-color mb-6 md-mb-40">
                        <div class="pt-25">
                            <div class="cadidate-avatar m-auto">
                                <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="" class="lazy-img rounded-circle w-100">
                            </div>
                        </div>
                        <h3 class="cadidate-name text-center"><?php echo e($service->name); ?></h3>
                        <div class="text-center pb-25">
                            <?php echo e($service->category->name); ?>

                        </div>
                        <ul class="style-none">
                            <li>
                                <span>Location: </span>
                                <div><?php echo e($service->location); ?></div>
                            </li>

                            <span>Social:</span>
                            <div>
                                <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                            </li>
                        </ul>
                        <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Book Now</a>
                    </div>
                    <!-- /.cadidate-bio -->
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=<?php echo e($service->location); ?>&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <h4 class="sidebar-title">Rate <?php echo e($service->name); ?></h4>
                </div>
                <!-- /.cadidate-profile-sidebar -->
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Overview</h3>
                        <p><?php echo $service->description; ?></p>
                    </div>
                    <?php if($service->media->isNotEmpty()): ?>
                    <div class="category-section-three pt-85 pb-140 lg-pb-100">
                        <div class="container">

                            <div class="inner-card border-style mb-65 lg-mb-40">
                                <div class="title-two mb-60 lg-mb-40">
                                    <h2 class="title">Other Services Media</h2>
                                </div>

                                <div class="row">
                                    <?php $__currentLoopData = $service->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card border-0 shadow-sm">
                                            <?php if($media->type === 'image'): ?>
                                            <img src="<?php echo e(asset('image/services/' . $media->file_path)); ?>" class="card-img-top" alt="Service Image">
                                            <?php elseif($media->type === 'video'): ?>
                                            <video class="card-img-top" controls>
                                                <source src="<?php echo e(asset('image/services/' . $media->file_path)); ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <h5 class="card-title">Service Media</h5>
                                                <a href="<?php echo e(asset('image/services/' . $media->file_path)); ?>" target="_blank" class="btn btn-primary">View</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">More</h3>
                        <div class="time-line-data position-relative pt-15">
                            <div class="info position-relative">
                                <div class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">1</div>

                                <h4>Inclusion</h4>
                                <?php $__currentLoopData = explode("|",$service->inclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo $inclusion; ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="info position-relative">
                                <div class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">2</div>

                                <h4>Exclusion</h4>
                                <?php $__currentLoopData = explode("|",$service->exclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo $exclusion; ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- ./info -->
                            <!-- ./info -->
                        </div>
                        <!-- /.time-line-data -->
                    </div>
                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">

                    <!-- /.inner-card -->
                    <?php if($r_service): ?>
                    <div class="inner-card">
                        <h3 class="title">Related</h3>
                        <div class="col-sm-4 mb-3">

                            <div class="job-list-two style-two position-relative">
                                <a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>" class="logo"><img src="images/lazy.svg" data-src="<?php echo e(asset('image/services')); ?>/<?php echo e($r_service->image); ?>" alt="" class="lazy-img m-auto"></a>
                                <span class="save-btn text-center tran3s" title="Save Job"><?php echo e($service->duration); ?></span>
                                <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>" class="job-duration fw-500"><?php echo e($r_service->category->name); ?></a></div>
                                <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>" class="title fw-500 tran3s"><?php echo e($r_service->name); ?></a></div>
                                <div class="job-salary"><span class="fw-500 text-dark"><?php echo e($r_service->price); ?></span> / RWF</div>
                                <div class="job-location"><a href="<?php echo e(route('home.service_location',['service_location'=>$r_service->location])); ?>"><?php echo e($r_service->location); ?></a></div>

                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <a href="<?php echo e(route('home.booking',['service_slug'=>$r_service->slug])); ?>" class="apply-btn text-center tran3s">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- /.inner-card -->

                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
    </div>
</section>
<!-- /.candidates-profile -->



<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<section class="job-portal-intro">
    <div class="container">
        <div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="text-center text-lg-start">
                        <h2>Most complete service portal.</h2>
                        <p class="text-md m0 md-pb-20">Signup and start find your service or talents.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
                        <li class="me-2"><a href="<?php echo e(route('home.services')); ?>" class="btn-three">Looking for Service?</a></li>
                        <li class="ms-2"><a href="<?php echo e(route('register')); ?>" class="btn-four">Join the team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.job-portal-intro -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/services/service-details.blade.php ENDPATH**/ ?>