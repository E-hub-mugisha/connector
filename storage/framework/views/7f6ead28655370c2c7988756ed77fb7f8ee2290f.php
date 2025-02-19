<?php $__env->startSection('title', 'Search Services'); ?>

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
                            <h2 class="text-white">Search Results</h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">We delivered blazing fast & striking work solution</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
        <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->

    <div class="container mt-5">
        <h2>Search Services</h2>

        <!-- Search form -->
        <form action="<?php echo e(route('services.search')); ?>" method="GET">
            <div class="row mb-4">
                <!-- Search by service name -->
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Search by service name" value="<?php echo e(request('name')); ?>">
                </div>

                <!-- Filter by category -->
                <div class="col-md-3">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Filter by subcategory -->
                <div class="col-md-3">
                    <select name="subcategory_id" class="form-control">
                        <option value="">Select Subcategory</option>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subcategory->id); ?>" <?php echo e(request('subcategory_id') == $subcategory->id ? 'selected' : ''); ?>>
                            <?php echo e($subcategory->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="location" class="form-control">
                        <option value="">Select location</option>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->location); ?>" <?php echo e(request('location') == $location->location ? 'selected' : ''); ?>>
                            <?php echo e($location->location); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- Search button -->
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Display search results -->
        <?php if(isset($services) && $services->count() > 0): ?>
        <h3 class="mt-4">Search Results</h3>
        <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php elseif(isset($services)): ?>
        <p>No services found.</p>
        <?php endif; ?>
    </div>
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
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/services/search.blade.php ENDPATH**/ ?>