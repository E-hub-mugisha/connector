<div>
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
                <a href="#">
                    <img src="<?php echo e(asset('assets/images/blogs/thumbnails')); ?>/<?php echo e($blog->thumbnail); ?>" alt="<?php echo e($blog->title); ?>" width="100%">
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
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
                    <p><?php echo e($blog->content); ?></p>
                </div><!-- End .entry-content -->
                <div class="form-footer">
                    <a href="<?php echo e(route('admin.edit_blog',['slug'=>$blog->slug])); ?>" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Edit blog</span>
                    </a>
                </div><!-- End .form-footer -->
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-blog-detail-component.blade.php ENDPATH**/ ?>