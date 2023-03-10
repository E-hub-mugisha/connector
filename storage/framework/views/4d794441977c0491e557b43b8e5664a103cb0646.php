<?php $__env->startSection('title', 'Home'); ?>

<div>
    <?php echo $__env->make('pages.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('pages.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="mb-4"></div><!-- End .mb-4 -->



    <div class="mb-3"></div><!-- End .mb-5 -->

    <div class="container new-arrivals">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Today's featured Services</h2><!-- End .title -->
            </div><!-- End .heading-left -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel just-action-icons-sm">
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": true,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                    <?php $__currentLoopData = $fservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>">
                                <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($service->category->image); ?>" alt="<?php echo e($service->name); ?>" class="product-image" style="width:230px; height:150px;">
                            </a>

                            <div class="product-action">
                                <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">

                            <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>"><?php echo e($service->name); ?></a></h3><!-- End .product-title -->
                            <div class="product-cat">
                                <a href="#"><?php echo e($service->category->name); ?></a>&nbsp;<span>|</span>&nbsp;<a href="#"><?php echo e($service->tagline); ?></a>
                            </div><!-- End .product-cat -->
                            <div class="product-price">
                                <?php echo e($service->price); ?><span>RWF</span>
                            </div><!-- End .product-price -->
                            <!-- <div class="product-desc">
                                            <?php echo e(Str::limit($service->description,50)); ?>

                                        </div> -->
                            <div class="ratings-container">

                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-detail" style="padding:10px;">
                                <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="btn btn-primary btn-round"><span>Read more </span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
            <img src="<?php echo e(asset('assets/images/demos/demo-4/camera.png')); ?>" alt="camera" class="cta-img">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>Shop Today’s Deals <br><strong>Awesome Made Easy. HERO7 Black</strong></p>
                        </div><!-- End .cta-text -->
                        <a href="<?php echo e(route('shop.shop')); ?>" class="btn btn-primary btn-round"><span>Shop Now </span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .cta-content -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->


    <!-- <div class="container">
        <hr class="mb-0">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/1.png')); ?>" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/2.png')); ?>" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/3.png')); ?>" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/4.png')); ?>" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/5.png')); ?>" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="<?php echo e(asset('assets/images/brands/6.png')); ?>" alt="Brand Name">
            </a>
        </div>
    </div> -->

    <div class="bg-light pt-5 pb-6">
        <div class="container trending-products">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Trending Products</h2><!-- End .title -->
                </div><!-- End .heading-left -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel just-action-icons-sm">
                <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": true,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>">
                                    <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($service->category->image); ?>" alt="<?php echo e($service->name); ?>" class="product-image" style="width:230px; height:150px;">
                                </a>

                                <div class="product-action">
                                    <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">

                                <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>"><?php echo e($service->name); ?></a></h3><!-- End .product-title -->
                                <div class="product-cat">
                                    <a href="#"><?php echo e($service->category->name); ?></a>&nbsp;<span>|</span>&nbsp;<a href="#"><?php echo e($service->tagline); ?></a>
                                </div><!-- End .product-cat -->
                                <div class="product-price">
                                    <?php echo e($service->price); ?><span>RWF</span>
                                </div><!-- End .product-price -->
                                <!-- <div class="product-desc">
                                            <?php echo e(Str::limit($service->description,50)); ?>

                                        </div> -->
                                <div class="ratings-container">

                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
                                <div class="product-detail" style="padding:10px;">
                                    <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="btn btn-primary btn-round"><span>Read more </span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
    </div><!-- End .bg-light pt-5 pb-6 -->

    <div class="mb-5"></div><!-- End .mb-5 -->
    <?php echo $__env->make('pages.services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <hr class="mb-5">
    </div><!-- End .container -->

    <div class="container new-arrivals">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Service Providers For You</h2><!-- End .title -->
            </div><!-- End .heading-left -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel just-action-icons-sm">
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": true,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                    <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($sprovider->sprovider_name)): ?>
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>">
                                <?php if($sprovider->image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sprovider->image); ?>" alt="<?php echo e($sprovider->sprovider_name); ?>" height="100">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($sprovider->sprovider_name); ?>" height="100">
                                <?php endif; ?>
                            </a>
                        </figure><!-- End .product-media -->

                        <div class="product-body">

                            <h3 class="product-title">
                                <a href="<?php echo e(route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])); ?>"><?php echo e($sprovider->sprovider_name); ?></a>
                            </h3><!-- End .product-title -->
                            <div class="product-cat">
                                <span>Provides:</span><a href="#"><?php if($sprovider->service_category_id): ?>
                                    <?php echo e($sprovider->category->name); ?>

                                    <?php endif; ?></a>Services <br />
                                <div class="mb-1"></div>
                                <div class="product-price">
                                    <span class="icon-map-marker"></span>&nbsp; <?php echo e($sprovider->city); ?>

                                </div>
                            </div><!-- End .product-cat -->
                            <div class="product-desc">
                                <?php echo e(Str::limit($sprovider->about,50)); ?>

                            </div>
                            <div class="ratings-container">

                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <!-- <div class="product-desc">
                                <?php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->distinct('user_id')->count();
                                ?>
                                <a href="#">Royal Customers: &nbsp;<?php echo e($totalSales); ?></a><br />
                                <a href="#">2 Comments</a><br />
                                <?php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->count();
                                ?>
                                <a href="#">Total Served customers: &nbsp;<?php echo e($totalSales); ?></a>
                            </div> -->
                        </div><!-- End .product-body -->

                    </div><!-- End .product -->
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->

    <?php echo $__env->make('pages.blogContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- <div class="icon-boxes-container bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Shipping</h3>
                            <p>Orders $50 or more</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Returns</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Get 20% Off 1 Item</h3>
                            <p>when you sign up</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">We Support</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
            <img src="<?php echo e(asset('assets/images/demos/demo-4/camera.png')); ?>" alt="camera" class="cta-img">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>Shop Today’s Deals <br><strong>Awesome Made Easy. HERO7 Black</strong></p>
                        </div><!-- End .cta-text -->
                        <a href="<?php echo e(route('shop.shop')); ?>" class="btn btn-primary btn-round"><span>Shop Now </span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .cta-content -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/home-component.blade.php ENDPATH**/ ?>