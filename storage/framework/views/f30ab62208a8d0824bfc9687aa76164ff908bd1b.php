
<?php $__env->startSection('title', 'Providers Blogs'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                
                <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash"><?php echo $__env->yieldContent('title'); ?></h4>
                    </div>
                    <div>
                        <a href="<?php echo e(route('serviceProviderBlog.CreateBlog')); ?>" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add blog</a>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e(Str::limit($blog->title, 50)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($blog->blog_category); ?>

                                    </td>
                                    <td>
                                        <label class="badge badge-danger">Pending</label>
                                    </td>
                                    <td>
                                        <?php echo e($blog->created_at); ?>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm" href="<?php echo e(route('serviceProviderBlog.blogDetail', $blog->slug )); ?>">
                                            <span class="badge badge-success">Read</span>
                                        </a>
                                        <form id="delete-form" action="<?php echo e(route('serviceProviderBlog.blogDelete', $blog->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <span class="badge badge-danger">Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/blog/index.blade.php ENDPATH**/ ?>