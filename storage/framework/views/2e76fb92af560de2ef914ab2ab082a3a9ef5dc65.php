<?php $__env->startSection('title', 'service by location'); ?>
<?php $__env->startSection('content'); ?>
<div>
    <!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
    <div class="inner-banner-one position-relative">
        <div class="container">
            <div class="position-relative">
                <div class="row">
                    <div class="col-xl-6 m-auto text-center">
                        <div class="title-two">
                            <h2 class="text-white">Service available</h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">We delivered blazing fast & striking work solution</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->



    <!-- 
		=============================================
			Job Listing Three
		============================================== 
		-->
    <section class="job-listing-three pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="filter-area-tab">
                        <div class="light-bg border-20 ps-4 pe-4">
                            <a class="filter-header border-20 d-block collapsed" data-bs-toggle="collapse" href="#collapseFilterHeader" role="button" aria-expanded="false"><span class="main-title fw-500 text-dark">Filter By</span></a>
                            <div class="collapse border-top" id="collapseFilterHeader">
                                <div class="pt-25 pb-30">

                                    <div class="row">
                                        <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scateg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="filter-block d-xl-flex pb-25">
                                                <div class="filter-title fw-500 text-dark mt-1 <?php echo e(count($scateg->subcategories) > 0 ? 'has-child-cate':''); ?>">
                                                    <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scateg->slug])); ?>"><?php echo e($scateg->name); ?></a>
                                                </div>
                                                <div class="main-body ps-xl-4 flex-fill">
                                                    <ul class="style-none filter-input">
                                                        <?php if(count($scateg->subcategories) > 0): ?>
                                                        <?php $__currentLoopData = $scateg->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <input type="checkbox" name="JobType" value="01">
                                                            <label>
                                                                <a href="<?php echo e(route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug])); ?>">
                                                                    <?php echo e($scat->name); ?>

                                                                </a>
                                                            </label>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /.filter-block -->
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-2 m-auto">
                                            <a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30 md-mt-10">Apply Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.filter header -->
                        </div>
                    </div>
                    <!-- /.filter-area-tab -->
                </div>

                <div class="col-12">
                    <div class="job-post-item-wrapper">
                        <div class="upper-filter d-flex justify-content-between align-items-center mb-25 mt-70 lg-mt-40">
                            <div class="total-job-found"><?php echo $__env->yieldContent('title'); ?></div>
                            <div class="d-flex align-items-center">
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
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <li class="me-2"><a href="<?php echo e(route('home.services')); ?>" class="btn-three">Looking for service?</a></li>
                        <li class="ms-2"><a href="<?php echo e(route('register')); ?>" class="btn-four">Join the team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.job-portal-intro -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/services/service-by-location.blade.php ENDPATH**/ ?>