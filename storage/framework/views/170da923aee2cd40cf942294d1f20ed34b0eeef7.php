
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('pages.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('pages.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- 
		=============================================
			Job Listing Three
		============================================== 
		-->
<section class="job-listing-three pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-11">
                <div class="job-post-item-wrapper ms-xxl-5 ms-xl-3">
                    <div class="upper-filter d-flex justify-content-between align-items-center mb-20">
                        <div class="total-job-found">
                            <div class="heading heading-flex mb-3">
                                <div class="heading-left">
                                    <h2 class="title">Services For You</h2><!-- End .title -->
                                </div><!-- End .heading-left -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="short-filter d-flex align-items-center">
                                <div class="text-dark fw-500 me-2">Short:</div>
                                <select name="sortby" id="sortby" class="nice-select form-control">
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Most Rated</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-box grid-style show">
                        <div class="row">
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-sm-3  mb-30">

                                    <div class="job-list-two style-two position-relative">
                                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="logo"><img src="images/lazy.svg" data-src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="image" class="lazy-img m-auto"></a>
                                        <span class="save-btn text-center tran3s" title="Save Job"><?php echo e($service->duration); ?></span>
                                        <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="job-duration fw-500"><?php echo e($service->category->name); ?></a></div>
                                        <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="title fw-500 tran3s"><?php echo e($service->name); ?></a></div>
                                        <div class="job-salary">Original Price:<span class="fw-500 text-dark" style="margin: 6px; color:#ff1e00;"><?php echo e($service->price); ?></span> / RWF</div>
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
                                        <div class="job-location"><span>Location:</span><a href="<?php echo e(route('home.service_location',['service_location'=>$service->location])); ?>"><?php echo e($service->location); ?></a></div>

                                        <div class="d-flex align-items-center justify-content-between mt-auto">
                                            <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="apply-btn text-center tran3s">Book Now</a>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- /.accordion-box -->


                </div>
                <!-- /.job-post-item-wrapper -->
            </div>
            <!-- /.col- -->
        </div>
    </div>
</section>
<!-- ./job-listing-three -->


<!-- 
		=============================================
			Candidates Profile
		============================================== 
		-->
<section class="candidates-profile bg-color pt-30 lg-pt-70 pb-30 lg-pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="position-relative">
                    <div class="upper-filter d-flex justify-content-between align-items-start align-items-md-center mb-20">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="heading heading-flex mb-3">
                                <div class="heading-left">
                                    <h2 class="title">Service Providers For You</h2><!-- End .title -->
                                </div><!-- End .heading-left -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="short-filter d-flex align-items-center">
                                <div class="text-dark fw-500 me-2">Short:</div>
                                <select class="nice-select">
                                    <option value="0">Latest</option>
                                    <option value="1">Category</option>
                                    <option value="2">Job Type</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.upper-filter -->
                    <div class="accordion-box grid-style show">
                        <div class="row">
                            <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($sprovider->sprovider_name)): ?>
                            <div class="col-xxl-3 col-lg-3 col-sm-6 d-flex">
                                <div class="candidate-profile-card favourite text-center grid-layout border-0 mb-25">
                                    <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="save-btn tran3s"><i class="bi bi-heart"></i></a>
                                    <div class="cadidate-avatar online position-relative d-block m-auto">
                                        <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="rounded-circle">
                                            <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/profile')); ?>/<?php echo e($sprovider->image); ?>" alt="" class="lazy-img rounded-circle" width="100%" height="90px">
                                        </a>
                                    </div>
                                    <h4 class="candidate-name mt-15 mb-0"><a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="tran3s"><?php echo e($sprovider->sprovider_name); ?></a></h4>
                                    <div class="candidate-post"><?php if($sprovider->service_category_id): ?>
                                        <?php echo e($sprovider->category->name); ?>

                                        <?php endif; ?>
                                    </div>
                                    <!-- <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
                                            <li>Design</li>
                                            <li>UI</li>
                                            <li>Digital</li>
                                            <li class="more">2+</li>
                                        </ul> -->
                                    <!-- /.cadidate-skills -->
                                    <div class="row gx-1">
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>Category</span>
                                                <div><?php if($sprovider->service_category_id): ?>
                                                    <?php echo e($sprovider->category->name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>Location</span>
                                                <div><?php echo e($sprovider->city); ?></div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                    </div>
                                    <div class="row gx-2 pt-25 sm-pt-10">
                                        <div class="col-md-6">
                                            <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="profile-btn tran3s w-100 mt-5">Profile</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="mailto:<?php echo e($sprovider->proEmail); ?>" class="msg-btn tran3s w-100 mt-5">Message</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.candidate-profile-card -->
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- /.accordion-box -->
                </div>
                <!-- /.-->
            </div>
            <!-- /.col- -->
        </div>
    </div>
</section>
<!-- ./candidates-profile -->

<?php echo $__env->make('includes.promotions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--
		=====================================================
			Fancy Banner Three
		=====================================================
		-->
<section class="fancy-banner-three mt-75 lg-mt-50">
    <div class="container">
        <div class="bg-wrapper position-relative wow fadeInUp">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-6 ms-auto">
                    <div class="text-wrapper wow fadeInRight">
                        <a class="fancybox rounded-circle video-icon tran3s d-flex align-items-center justify-content-center" data-fancybox="" href="#">
                            <i class="bi bi-play-fill"></i>
                        </a>
                        <div class="title-one mt-35 lg-mt-30 mb-30 lg-mb-20">
                            <h2 class="fw-600 text-white">Let’s get started
                                It’s <span style="color: #00BF58;">simple.</span></h2>
                        </div>
                        <p class="text-white">Get access to our top 1% talent as well as a complete set of hybrid workforce management tools.</p>
                    </div>
                </div>
            </div>

            <div class="bottom-content position-relative">
                <div class="row gx-xxl-5 justify-content-between">
                    <div class="col-lg-4">
                        <div class="d-flex mt-20 wow fadeInUp">
                            <div class="count fw-500 rounded-circle text-white d-flex align-items-center justify-content-center">1</div>
                            <div class="ps-4 text">
                                <div class="fw-500 text-white text-lg mb-10">It’s take 2 minutes to open an account.</div>
                                <a href="<?php echo e(route('register')); ?>" class="fw-500 text-uppercase">Open Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex mt-20 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="count fw-500 rounded-circle text-white d-flex align-items-center justify-content-center">2</div>
                            <div class="ps-4 text">
                                <div class="fw-500 text-white text-lg mb-10">Find talents or search
                                    your desire work.</div>
                                <a href="<?php echo e(route('home.services')); ?>" class="fw-500 text-uppercase">Apply job or hire</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex mt-20 wow fadeInUp" data-wow-delay="0.35s">
                            <div class="count fw-500 rounded-circle text-white d-flex align-items-center justify-content-center">3</div>
                            <div class="ps-4 text">
                                <div class="fw-500 text-white text-lg mb-10">Get work done quickly with connector.</div>
                                <a href="#" class="fw-500 text-uppercase">Payment Method</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.bg-wrapper -->
</section>
<!-- /.fancy-banner-three -->


<?php echo $__env->make('includes.call-to-action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('pages.blogContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--
		=====================================================
			FeedBack Section One
		=====================================================
		-->
<section class="feedback-section-one pt-45 xl-pt-45 lg-pt-50 pb-40 lg-pb-10">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="title-one text-center text-md-start mb-65 md-mb-50">
                    <h2>Here From our clients</h2>
                </div>
            </div>
        </div>

        <div class="row feedback-slider-one">
            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="feedback-block-one">
                    <!-- <div class="logo">
                        <img src="<?php echo e(asset('asset/images/logo/media_01.png')); ?>" alt="">
                    </div> -->
                    <blockquote class="fw-500 mt-30 md-mt-30 mb-30 md-mb-30">“<?php echo e($feedback->message); ?>.”</blockquote>
                    <div class="name text-dark"><span class="fw-500"><?php echo e($feedback->name); ?></span></div>
                    <!-- <div class="review pt-40 md-pt-20 mt-40 md-mt-30 d-flex justify-content-between align-items-center">
                        <div class="text-md fw-500 text-dark">4.5 Excellent</div>
                        <ul class="style-none d-flex">
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- /.feedback-block-one -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <ul class="slider-arrows slick-arrow-one d-flex justify-content-center style-none sm-mt-30">
            <li class="prev_b slick-arrow"><i class="bi bi-arrow-left"></i></li>
            <li class="next_b slick-arrow"><i class="bi bi-arrow-right"></i></li>
        </ul>
    </div>
</section>

<!-- /.feedback-section-one -->

<?php echo $__env->make('includes.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/pages/home.blade.php ENDPATH**/ ?>