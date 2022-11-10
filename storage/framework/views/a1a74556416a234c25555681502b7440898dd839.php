<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="category-banners-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                                    "nav": false,

                                    "responsive": {
                                        "1200": {
                                            "nav": true
                                        }
                                    }
                                }'>
                        <div class="banner banner-poster">

                            <a href="#">
                                <img src="<?php echo e(asset('assets/images/demos/demo-13/banners/banner-7.jpg')); ?>" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-right">
                                <h3 class="banner-subtitle"><a href="#">Amazing Value</a></h3><!-- End .banner-subtitle -->
                                <h2 class="banner-title"><a href="#">High Performance 4K TVs</a></h2><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner banner-poster">
                            <a href="#">
                                <img src="<?php echo e(asset('assets/images/demos/demo-13/banners/banner-8.jpg')); ?>" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h3 class="banner-subtitle"><a href="#">Weekend Deal</a></h3><!-- End .banner-subtitle -->
                                <h2 class="banner-title"><a href="#">Apple & Accessories</a></h2><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .owl-carousel -->

                    <div class="mb-3"></div><!-- End .mb-3 -->

                    <h2 class="title title-border">Category</h2><!-- End .title -->

                    <div class="owl-carousel owl-simple owl-nav-top carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                    "nav": true, 
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
                                        "1200": {
                                            "items":4
                                        }
                                    }
                                }'>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-top">Top</span>
                                <a href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>">
                                    <img src="<?php echo e(asset('assets/images/category/products')); ?>/<?php echo e($category->image); ?>" alt="<?php echo e($category->name); ?>" class="product-image">
                                </a>


                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>"><?php echo e($category->name); ?></a>
                                </h3><!-- End .product-title -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- End .owl-carousel -->
                    <div class="mb-4"></div><!-- End .mb-4 -->
                </div><!-- End .col-lg-9 -->
            </div>
            <div class="row">
                <aside class="col-lg-3">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-categories">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <div class="widget-body">
                                <div class="accordion" id="widget-cat-acc">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="acc-item">
                                        <h5>
                                            <a role="button" href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>">
                                                <?php echo e($category->name); ?>

                                            </a>
                                        </h5>
                                    </div><!-- End .acc-item -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div><!-- End .accordion -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Products found
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control" wire:model="sorting">
                                        <option value="default" selected="selected">Default</option>
                                        <option value="date">Newest</option>
                                        <option value="price-desc">high to low</option>
                                        <option value="price">low to high</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <span class="product-label label-new"><?php echo e($product->stock_status); ?></span>
                                        <a href="<?php echo e(route('product-detail',['product_slug'=>$product->slug])); ?>">
                                            <img src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($product->image); ?>" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo e($product->SKU); ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="<?php echo e(route('product-detail',['product_slug'=>$product->slug])); ?>"><?php echo e($product->name); ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $<?php echo e($product->regular_price); ?>

                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 12 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                        
                                            <a href="#" class="btn-product btn-cart" wire:click.prevent="store(<?php echo e($product->id); ?>,'<?php echo e($product->name); ?>',<?php echo e($product->regular_price); ?>)">Add To Cart</a>
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="d-flex">
                        <?php echo e($products->Links()); ?>

                    </div>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div><?php /**PATH D:\hile\hiletasker\resources\views/livewire/shop/shop-component.blade.php ENDPATH**/ ?>