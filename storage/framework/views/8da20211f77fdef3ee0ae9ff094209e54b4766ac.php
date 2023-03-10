<?php $__env->startSection('title', 'Service Details'); ?>

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo e($service->name); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>

    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($service->image); ?>" data-zoom-image="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($service->image); ?>" alt="<?php echo e($service->name); ?>">


                            </figure><!-- End .product-main-image -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title" style="font-size: 3rem; font-weight:600;"><?php echo e($service->name); ?></h1><!-- End .product-title -->
                        <div class="product-title">
                            <span>Category:</span>
                            <a href="#"><?php echo e($service->category->name); ?></a><br />
                        </div><!-- End .product-cat -->
                        <div class="product-content">
                            <p><?php echo e($service->description); ?></p>
                        </div><!-- End .product-content -->

                        <div class="details-filter-row details-row-size">
                            <div class="product-price">
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
                        </div><!-- End .product-price -->
                    </div><!-- End .details-filter-row -->

                    <div class="product-details-action">
                        <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="btn-product btn-cart"><span>Book Now</span></a>

                        <div class="details-action-wrapper">
                            <a href="#" class="btn-product btn-wishlist" title="Wishlist">
                                <span>
                                    Provider's Profile
                                </span>
                            </a>
                        </div>
                    </div><!-- End .product-details-action -->

                    <div class="product-details-footer">

                        <div class="social-icons social-icons-sm">
                            <div class="ss-box"></div>
                        </div>
                    </div><!-- End .product-details-footer -->
                </div><!-- End .product-details -->
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .product-details-top -->

    <div class="product-details-tab">
        <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Inclusion information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Exclusion Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                <div class="product-desc-content">
                    <h3><?php echo e($service->name); ?> Information</h3>
                    <p><?php echo e($service->description); ?></p>
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                <div class="product-desc-content">
                    <h3><?php echo e($service->name); ?> Inclusion</h3>
                    <ul>
                        <?php $__currentLoopData = explode("|",$service->inclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($inclusion); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                <div class="product-desc-content">
                    <h3><?php echo e($service->name); ?> Exclusion</h3>
                    <ul>
                        <?php $__currentLoopData = explode("|",$service->exclusion); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($exclusion); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('service-ratings', ['service' => $service])->html();
} elseif ($_instance->childHasBeenRendered($service->id)) {
    $componentId = $_instance->getRenderedChildComponentId($service->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($service->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($service->id);
} else {
    $response = \Livewire\Livewire::mount('service-ratings', ['service' => $service]);
    $html = $response->html();
    $_instance->logRenderedChild($service->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .product-details-tab -->

    <?php if($r_service): ?>
    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
    <div class="container">
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
            <div class="product product-2">
                <figure class="product-media">
                    <a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>">
                        <img src="<?php echo e(asset('assets/images/category')); ?>/<?php echo e($r_service->category->image); ?>" alt="<?php echo e($r_service->name); ?>" class="product-image" style="width:230px; height:150px;">
                    </a>

                    <div class="product-action">
                        <a href="<?php echo e(route('home.booking',['service_slug'=>$r_service->slug])); ?>" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">

                    <h3 class="product-title"><a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>"><?php echo e($r_service->name); ?></a></h3><!-- End .product-title -->
                    <div class="product-cat">
                        <a href="#"><?php echo e($r_service->category->name); ?></a>&nbsp;<span>|</span>&nbsp;<a href="#"><?php echo e($r_service->tagline); ?></a>
                    </div><!-- End .product-cat -->
                    <div class="product-price">
                        <?php echo e($r_service->price); ?><span>RWF</span>
                    </div><!-- End .product-price -->
                    <!-- <div class="product-desc">
                                            <?php echo e(Str::limit($r_service->description,50)); ?>

                                        </div> -->
                    <div class="ratings-container">

                        <div class="ratings">
                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 4 Reviews )</span>
                    </div><!-- End .rating-container -->
                    <div class="product-detail" style="padding:10px;">
                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$r_service->slug])); ?>" class="btn btn-primary btn-round"><span>Read more </span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .product-action -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .owl-carousel -->
        <?php endif; ?>
    </div><!-- End .container -->
</div><!-- End .page-content -->
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/service-details-component.blade.php ENDPATH**/ ?>