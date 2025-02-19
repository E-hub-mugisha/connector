<!--
		=====================================================
			Blog Section One
		=====================================================
		-->
<section class="blog-section-one mt-160 xl-mt-30 lg-mt-100">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-7">
                    <div class="heading text-center mb-3">
                        <h2 class="title">Today’s</h2><!-- End .title -->
                        <p class="title-desc">News</p><!-- End .title-desc -->
                    </div><!-- End .heading -->
                </div>
            </div>

            <div class="row gx-xl-5">
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
            </div>

            <div class="text-center explore-btn sm-mt-50"><a href="<?php echo e(route('home.blogs')); ?>" class="btn-six">Explore More</a></div>
        </div>
    </div>
</section>
<!-- /.blog-section-one -->

<?php /**PATH /home4/connector/public_html/hiletask/resources/views/pages/blogContent.blade.php ENDPATH**/ ?>