<?php $__env->startSection('title','Blog Detail'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <a href="#">
                    <img src="<?php echo e(asset('image/blog')); ?>/<?php echo e($blog->image); ?>" alt="<?php echo e($blog->title); ?>" width="100%">
                </a>
                <div class="entry-meta">
                    <span class="entry-author">
                        by <a href="#">HileTasker</a>
                    </span><br />
                    <span class="meta-separator">|</span>
                    <a href="#"><?php echo e($blog->created_at); ?></a>
                    <span class="meta-separator">|</span>
                    <a href="#">2 Comments</a>
                </div><!-- End .entry-meta -->

                <h4 class="entry-title">
                    <a href="#"><?php echo e(Str::limit($blog->title, 50)); ?></a>
                </h4><!-- End .entry-title -->

                <div class="entry-cats">
                    in <a href="#"><?php echo e($blog->blog_category); ?></a>
                </div><!-- End .entry-cats -->

                <div class="entry-content">
                    <p><?php echo $blog->content; ?></p>
                </div><!-- End .entry-content -->
                <div class="form-footer">
                    <a href="<?php echo e(route('serviceProviderBlog.editBlog', $blog->id)); ?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Edit blog</span>
                    </a>
                </div><!-- End .form-footer -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/blog/show.blade.php ENDPATH**/ ?>