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
                <aside class="col-lg-3">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-categories">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <div class="widget-body">
                                <div class="accordion" id="widget-cat-acc">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="acc-item">
                                        <h5 class="category-item <?php echo e(count($category->subcategories) > 0 ? 'has-child-cate':''); ?>">
                                            <a role="button" href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>">
                                                <?php echo e($category->name); ?>

                                            </a>
                                            <?php if(count($category->subcategories)>0): ?>
                                            <ul>
                                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])); ?>"><?php echo e($scategory->name); ?></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
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
                                <?php echo e($category_name); ?> Products found
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

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->


                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="<?php echo e(route('product.brand',['brand'=>$product->brand])); ?>"><?php echo e($product->brand); ?></a>
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
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/shop/product-category-component.blade.php ENDPATH**/ ?>