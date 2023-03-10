<?php $__env->startSection('title', 'Services'); ?>

<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Services</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing Services
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row ">
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
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
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <?php echo e($services->links()); ?>

                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-2 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <!-- <a href="#" class="sidebar-filter-clear">Clean All</a> -->
                        </div><!-- End .widget widget-clean -->
                        <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="custom-control-label" for="cat-1"><?php echo e($scategory->name); ?></a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <?php $__currentLoopData = $scategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="#" class="custom-control-label" for="cat-1"><?php echo e($scat->name); ?></a>
                                            </div><!-- End .custom-checkbox -->
                                            <!-- <span class="item-count">3</span> -->
                                        </div><!-- End .filter-item -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/services-component.blade.php ENDPATH**/ ?>