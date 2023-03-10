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
</div><!-- End .container --><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/pages/services.blade.php ENDPATH**/ ?>