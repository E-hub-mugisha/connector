<?php $__env->startSection('title', 'Profile'); ?>

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($sproviders->sprovider_name); ?></li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="card shadow product-details-top mt-2 mb-2">
            <div class="row">
                <div class="col-md-4" style="padding:2rem;">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                <?php if($sproviders->image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sproviders->image); ?>" alt="<?php echo e($sproviders->user->name); ?>">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($sproviders->user->name); ?>">
                                <?php endif; ?>
                            </figure><!-- End .product-main-image -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-8" style="padding:2rem;">
                    <div class="product-details product-details-centered">
                        <h1 ><?php echo e($sproviders->sprovider_name); ?></h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <span>Category:</span>&nbsp;
                            <span>
                                <?php if($sproviders->service_category_id): ?>
                                <?php echo e($sproviders->category->name); ?>

                                <?php endif; ?>
                            </span>
                        </div><!-- End .rating-container -->

                        <div class="product-price">
                            <?php echo e($sproviders->city); ?>

                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p><?php echo e($sproviders->about); ?></p>
                        </div><!-- End .product-content -->

                        <div class="product-details-action">
                            <div class="details-action-col">
                                <span>Total served:</span>
                                <?php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sproviders->id)->where('status','completed')->count();
                                ?>
                                <span><?php echo e($totalSales); ?></span>
                            </div><!-- End .details-action-col -->
                        </div><!-- End .product-details-action -->

                        <div class="product-details-footer">
                            <div class="social-icons social-icons-sm">
                                <div class="ss-box"></div>
                                <!-- <span class="social-label">Share:</span> -->
                                <!-- <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a> -->
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
                <div class="col-md-12">
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <p><?php echo e($sproviders->about); ?></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('s-provider-rating', ['sproviders' => $sproviders])->html();
} elseif ($_instance->childHasBeenRendered($sproviders->id)) {
    $componentId = $_instance->getRenderedChildComponentId($sproviders->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($sproviders->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($sproviders->id);
} else {
    $response = \Livewire\Livewire::mount('s-provider-rating', ['sproviders' => $sproviders]);
    $html = $response->html();
    $_instance->logRenderedChild($sproviders->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                </div>
            </div><!-- End .row -->
            <h2 class="title text-center mb-4">Service Provided</h2><!-- End .title text-center -->

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
                <?php $__currentLoopData = \App\Models\Service::where('service_provider_id',$sproviders->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product product-2">
                    <figure class="product-media">
                        <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>">
                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" alt="<?php echo e($service->name); ?>" class="product-image" style="width:230px; height:150px;">
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
        </div><!-- End .product-details-top -->




    </div><!-- End .container -->
</div><!-- End .page-content --><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/service-provider-profile-component.blade.php ENDPATH**/ ?>