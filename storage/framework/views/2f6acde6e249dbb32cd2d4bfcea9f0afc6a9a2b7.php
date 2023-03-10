<div>
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false,
                        "loop": true, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="intro-slide" style="background-image: url(assets/images/slider/<?php echo e($slider->image); ?>);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                            <h2 class="intro-title"><?php echo e($slider->title); ?></h2><!-- End .intro-title -->

                            <a href="<?php echo e(route('shop.shop')); ?>" class="btn btn-primary btn-round">
                                <span>Shop Products</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->

        <div class="cat-blocks-container">
            <div class="row">
                <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="cat-block">
                        <figure>
                            <span>
                                <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($scategory->image); ?>" alt="<?php echo e($scategory->name); ?>">
                            </span>
                        </figure>

                        <h3 class="cat-block-title"><?php echo e($scategory->name); ?></h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- End .row -->
            <div class="more-container text-center mt-1 mb-5">
                <a href="<?php echo e(route('home.service_categories')); ?>" class="btn btn-outline-dark-2 btn-round btn-more"><span>View all</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title">Today’s</h2><!-- End .title -->
            <p class="title-desc">Featured deal and more</p><!-- End .title-desc -->
        </div><!-- End .heading -->
        <div class="row justify-content-center">
            <?php $__currentLoopData = $fscategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-3">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>">
                        <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($scategory->image); ?>" alt="<?php echo e($scategory->name); ?>" style="height: 198px;">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>">Featured</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>"><strong><?php echo e($scategory->name); ?></strong></a></h3><!-- End .banner-title -->
                        <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="banner-link">View Now<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-md-4 -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- End .row -->
    </div><!-- End .container -->

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
                            <span class="product-label label-circle label-top">Top</span>
                            <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>">
                                <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" alt="<?php echo e($service->name); ?>" class="product-image">
                            </a>

                            <div class="product-action">
                                <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart" title="Book Now">Book Now</a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#"><?php echo e($service->category->name); ?></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>"><?php echo e($service->name); ?></a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $<?php echo e($service->price); ?>

                            </div><!-- End .product-price -->
                            <div class="product-desc">
                                <?php echo e(Str::limit($service->description,50)); ?>

                            </div>
                            <div class="ratings-container">

                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div><!-- End .rating-container -->
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

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title">Deals & Outlet</h2><!-- End .title -->
            <p class="title-desc">Today’s deal and more</p><!-- End .title-desc -->
        </div><!-- End .heading -->

        <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('assets/images/blogs/thumbnails/<?php echo e($blog->thumbnail); ?>');">
                    <div class="deal-content">
                        <h3 class="product-title"><a href="<?php echo e(route('home.blog_detail',['blog_slug'=>$blog->slug])); ?>"><?php echo e(Str::limit($blog->title, 50)); ?></a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">In <?php echo e($blog->blog_category); ?> </span>
                            <span class="old-price">On: <?php echo e($blog->created_at); ?></span>
                        </div><!-- End .product-price -->

                        <a href="<?php echo e(route('home.blog_detail',['blog_slug'=>$blog->slug])); ?>" class="btn btn-link"><span>Read more</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .deal-content -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- End .row -->

        <div class="more-container text-center mt-1 mb-5">
            <a href="<?php echo e(route('home.blogs')); ?>" class="btn btn-outline-dark-2 btn-round btn-more"><span>More Blogs</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
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

                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" id="trending-all-link" data-toggle="tab" href="#trending-all-tab" role="tab" aria-controls="trending-all-tab" aria-selected="false">All</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Appliances</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">Cleaning</a>
                        </li>

                    </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content tab-content-carousel just-action-icons-sm">
                        <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                            "nav": false, 
                                            "dots": false,
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
                                                }
                                            }
                                        }'>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>">
                                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" alt="<?php echo e($service->name); ?>" class="product-image">
                                        </a>

                                        <div class="product-action">
                                            <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo e($service->category->name); ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>"><?php echo e($service->name); ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $<?php echo e($service->price); ?>

                                        </div><!-- End .product-price -->
                                        <div class="product-desc">
                                            <?php echo e(Str::limit($service->description,50)); ?>

                                        </div>
                                        <div class="ratings-container">

                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade " id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                            "nav": false, 
                                            "dots": false,
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
                                                }
                                            }
                                        }'>
                                <?php $__currentLoopData = $aservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aservice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">Top</span>
                                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$aservice->slug])); ?>">
                                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($aservice->thumbnail); ?>" alt="<?php echo e($aservice->name); ?>" class="product-image">
                                        </a>

                                        <div class="product-action">
                                            <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo e($aservice->category->name); ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$aservice->slug])); ?>"><?php echo e($aservice->name); ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $<?php echo e($aservice->price); ?>

                                        </div><!-- End .product-price -->
                                        <div class="product-desc">
                                            <?php echo e(Str::limit($service->description,50)); ?>

                                        </div>
                                        <div class="ratings-container">

                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel" aria-labelledby="trending-best-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                            "nav": false, 
                                            "dots": false,
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
                                                }
                                            }
                                        }'>
                                <?php $__currentLoopData = $cleanservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cleanservice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$cleanservice->slug])); ?>">
                                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($cleanservice->thumbnail); ?>" alt="<?php echo e($cleanservice->name); ?>" class="product-image">
                                        </a>

                                        <div class="product-action">
                                            <a href="<?php echo e(route('home.booking',['service_slug'=>$cleanservice->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo e($cleanservice->category->name); ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$cleanservice->slug])); ?>"><?php echo e($cleanservice->name); ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $<?php echo e($cleanservice->price); ?>

                                        </div><!-- End .product-price -->
                                        <div class="product-desc">
                                            <?php echo e(Str::limit($service->description,50)); ?>

                                        </div>
                                        <div class="ratings-container">

                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .col-xl-4-5col -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .bg-light pt-5 pb-6 -->

    <div class="mb-5"></div><!-- End .mb-5 -->


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
                            <a href="<?php echo e(route('home.service-provider_profile',['sprovider_name'=>$sprovider->sprovider_name])); ?>">
                                <?php if($sprovider->image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sprovider->image); ?>" alt="<?php echo e($sprovider->sprovider_name); ?>" height="100">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($sprovider->sprovider_name); ?>" height="100">
                                <?php endif; ?>
                            </a>
                        </figure><!-- End .product-media -->

                        <div class="product-body">

                            <h3 class="product-title">
                                <a href="<?php echo e(route('home.service-provider_profile',['sprovider_name'=>$sprovider->sprovider_name])); ?>"><?php echo e($sprovider->sprovider_name); ?></a>
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
                            <div class="product-desc">
                                <?php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->distinct('user_id')->count();
                                ?>
                                <a href="#">Royal Customers: &nbsp;<?php echo e($totalSales); ?></a><br />
                                <a href="#">2 Comments</a><br />
                                <?php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->count();
                                ?>
                                <a href="#">Total Served customers: &nbsp;<?php echo e($totalSales); ?></a>
                            </div>
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
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/home-component.blade.php ENDPATH**/ ?>