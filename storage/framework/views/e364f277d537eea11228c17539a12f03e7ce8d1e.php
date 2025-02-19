
<?php $__env->startSection('title','Service Providers'); ?>
<?php $__env->startSection('content'); ?>

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
                        <h2 class="text-white"><?php echo $__env->yieldContent('title'); ?></h2>
                    </div>
                    <p class="text-lg text-white mt-30 lg-mt-20">Find your desire provider and get your dream service</p>
                </div>
            </div>

        </div>
    </div>
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->


<!-- 
		=============================================
			Candidates Profile
		============================================== 
		-->
<section class="candidates-profile bg-color pt-90 lg-pt-70 pb-160 xl-pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper">
                    <div class="upper-filter d-flex justify-content-between align-items-start align-items-md-center mb-25">
                        <div class="d-md-flex align-items-center">
                            <button type="button" class="filter-btn fw-500 tran3s me-3" data-bs-toggle="modal" data-bs-target="#filterPopUp">
                                <i class="bi bi-funnel"></i>
                                Filter
                            </button>
                            <div class="total-job-found md-mt-10">All <span class="text-dark fw-500">320</span> Provider found</div>
                            <!-- Modal -->
                            <div class="modal popUpModal fade" id="filterPopUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                    <div class="container">
                                        <div class="filter-area-tab modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="position-relative">
                                                <div class="main-title fw-500 text-dark ps-4 pe-4 pt-15 pb-15 border-bottom">Filter By</div>
                                                <div class="pt-25 pb-30 ps-4 pe-4">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="filter-block pb-50 lg-pb-20">
                                                                <div class="filter-title fw-500 text-dark">Keyword or Title</div>
                                                                <form action="#" class="input-box position-relative">
                                                                    <input type="text" placeholder="Search by Keywords">
                                                                    <button><i class="bi bi-search"></i></button>
                                                                </form>
                                                            </div>
                                                            <!-- /.filter-block -->
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="filter-block pb-50 lg-pb-20">
                                                                <div class="filter-title fw-500 text-dark">Category</div>
                                                                <?php $__currentLoopData = \App\Models\ServiceProvider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(!empty($sprovider->sprovider_name)): ?>
                                                                <a href="<?php echo e(route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])); ?>" class="custom-control-label" for="cat-1">
                                                                    <?php if($sprovider->service_category_id): ?>
                                                                    <?php echo e($sprovider->category->name); ?>

                                                                    <?php endif; ?> </a>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <!-- /.filter-block -->
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="filter-block pb-50 lg-pb-20">
                                                                <div class="filter-title fw-500 text-dark">Location</div>
                                                                <?php $__currentLoopData = \App\Models\ServiceProvider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(!empty($sprovider->sprovider_name)): ?>
                                                                <a href="<?php echo e(route('home.providerByLocation',['location'=>$sprovider->service_locations])); ?>" class="custom-control-label" for="cat-1">
                                                                    <?php echo e($sprovider->service_locations); ?> </a>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <!-- /.filter-block -->
                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- /.filter header -->
                                            </div>
                                        </div>
                                        <!-- /.filter-area-tab -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="upper-filter d-flex justify-content-between align-items-start align-items-md-center mb-20">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="heading heading-flex mb-3">
                                    <div class="heading-left">
                                        <h2 class="title">Service Providers For You</h2><!-- End .title -->
                                    </div><!-- End .heading-left -->
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.upper-filter -->
                        <div class="accordion-box grid-style show">
                            <div class="row">
                                <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($sprovider->sprovider_name)): ?>
                                <div class="col-xxl-4 col-lg-4 col-sm-6 d-flex">
                                    <div class="candidate-profile-card favourite text-center grid-layout border-0 mb-25">
                                        <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="save-btn tran3s"><i class="bi bi-heart"></i></a>
                                        <div class="cadidate-avatar online position-relative d-block m-auto">
                                            <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="rounded-circle">
                                                <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/profile')); ?>/<?php echo e($sprovider->image); ?>" alt="" class="lazy-img rounded-circle"></a>
                                        </div>
                                        <h4 class="candidate-name mt-15 mb-0"><a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="tran3s"><?php echo e($sprovider->sprovider_name); ?></a></h4>
                                        <div class="candidate-post">
                                            <?php if($sprovider->service_category_id): ?>
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
                                                <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>" class="profile-btn tran3s w-100 mt-5">View Profile</a>
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
<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<?php echo $__env->make('includes.call-to-action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /.job-portal-intro -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/service_provider/serviceProviders.blade.php ENDPATH**/ ?>