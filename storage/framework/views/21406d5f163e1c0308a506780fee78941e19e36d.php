<?php $__env->startSection('title','Blog Detail'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
                <a href="#">
                    <img src="<?php echo e(asset('image/blog')); ?>/<?php echo e($blog->image); ?>" alt="<?php echo e($blog->title); ?>" width="100%">
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="entry-meta">
                    <span class="entry-author">
                        by <a href="#"><?php echo e($blog->author->name); ?></a>
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
                    <div>
                    <a href="<?php echo e(route('admin.edit_blog', $blog->id)); ?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Edit blog</span>
                    </a>
                    </div>
                    <div>
                    <form id="approve-form" action="<?php echo e(route('admin.blogApprove', $blog->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this blog?')">
                                    Approve</button>
                            </form>
                            </div>
                </div><!-- End .form-footer -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/blogs/show.blade.php ENDPATH**/ ?>