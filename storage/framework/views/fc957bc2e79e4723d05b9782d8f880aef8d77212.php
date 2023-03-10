<div>
    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <span><?php echo e($brand); ?></span> Products found
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
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-3 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <span class="product-label label-new"><?php echo e($product->stock_status); ?></span>
                                        <a href="<?php echo e(route('product-detail',['product_slug'=>$product->slug])); ?>">
                                            <img src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($product->image); ?>" alt="Product image" class="product-image">
                                        </a>
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
                                            <div class="product-desc">
                                                <?php echo e(Str::limit($product->short_description,50)); ?>

                                            </div>
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
                        <?php echo e($brands->Links()); ?>

                    </div>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/shop/product-brand-component.blade.php ENDPATH**/ ?>