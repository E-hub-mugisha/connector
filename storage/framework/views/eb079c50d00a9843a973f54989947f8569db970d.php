
<?php $__env->startSection('title','Blogs result'); ?>
<?php $__env->startSection('content'); ?>

<!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Blog<span> search results </span></h3>
                    
                </div>
            </div>

        </div>
    </div>
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<section class="blog-section-one mt-160 xl-mt-30 lg-mt-100">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading text-center mb-3">
                        <h2 class="title">Today’s</h2><!-- End .title -->
                        <p class="title-desc">News</p><!-- End .title-desc -->
                    </div><!-- End .heading -->
                </div>
                <div class="col-lg-6">
                    <form action="<?php echo e(route('searchBlog.home')); ?>" method="GET">
    <input type="text" name="query" placeholder="Search..." value="<?php echo e(request('query')); ?>" required>

    <button type="submit" class="btn" style="color: #fff; background: #6B9080;">Search</button>
</form>

                </div>
            </div>

            <div class="row gx-xl-5">
                <?php if($blogs->isEmpty()): ?>
        <p>No posts found.</p>
    <?php else: ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <article class="blog-meta-two mt-15 xs-mt-20 wow fadeInUp">
                        <figure class="post-img m0">
                            <a href="<?php echo e(route('home.blog_detail',['blog_slug'=>$blog->slug])); ?>" class="w-100 d-block">
                                <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/blog')); ?>/<?php echo e($blog->image); ?>" alt="" class="lazy-img w-100 tran4s" style="height: 300px; width: 100%; object-fit: cover;"></a>
                            <a href="<?php echo e(route('blogCategory.show', $blog->blog_category)); ?>" class="tags fw-500"><?php echo e($blog->blog_category); ?></a>
                        </figure>
                        <div class="post-data mt-15 lg-mt-20">
                           <div class="date">
    <span class="fw-500 text-dark">Created BY:</span> 
    <?php if($blog->author && $blog->author->utype === 'SVP'): ?>

    <?php
        $sprovider = \App\Models\ServiceProvider::where('user_id', $blog->author->id)->first();
    ?>

    <?php if($sprovider): ?>
        <a href="https://connector.rw/profile/<?php echo e($sprovider->id); ?>"><?php echo e($blog->author->name); ?></a>
    <?php else: ?>
        <a href="#"><?php echo e($blog->author ? $blog->author->name : 'Unknown Author'); ?></a>
    <?php endif; ?>

<?php else: ?>
    <a href="#"><?php echo e($blog->author ? $blog->author->name : 'Unknown Author'); ?></a>
<?php endif; ?>
</div>
                          
                            <a href="<?php echo e(route('home.blog_detail',['blog_slug'=>$blog->slug])); ?>">
                                <h4 class="tran3s blog-title"><?php echo e(Str::limit($blog->title, 50)); ?></h4>
                            </a>
                            <a href="<?php echo e(route('home.blog_detail',['blog_slug'=>$blog->slug])); ?>" class="continue-btn tran3s d-flex align-items-center">
                                <span class="fw-500 me-2">Continue Reading</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <!-- /.blog-meta-two -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="text-center explore-btn sm-mt-50"><a href="<?php echo e(route('home.blogs')); ?>" class="btn-six">Explore More</a></div>
        </div>
    </div>
</section>




<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<?php echo $__env->make('includes.call-to-action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /.job-portal-intro -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/pages/blogsearch.blade.php ENDPATH**/ ?>