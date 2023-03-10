<div class="container">
    <div class="heading text-center mb-3">
        <h2 class="title">Today’s</h2><!-- End .title -->
        <p class="title-desc">News</p><!-- End .title-desc -->
    </div><!-- End .heading -->

    <div class="row">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class=" col-md-4 deal-col">
            <div class="card shadow deal" style="background-image: url('assets/images/blogs/thumbnails/<?php echo e($blog->thumbnail); ?>');">
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
</div><!-- End .container --><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/pages/blogContent.blade.php ENDPATH**/ ?>