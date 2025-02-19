<?php $__env->startSection('title','Edit Blog'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Blog</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('serviceProviderBlog.blogUpdate', $blog->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                        <div class="form-group">
                            <label for="title" value="<?php echo e(__('title')); ?>">title *</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e($blog->title); ?>" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->

                        <div class="col-md-6 form-group">
                            <label for="blog_category" value="<?php echo e(__('blog_category')); ?>">blog category</label>
                            <select class="form-control" id="blog_category" name="blog_category">
                                <option value="<?php echo e($blog->blog_category); ?>"><?php echo e($blog->blog_category); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['blog_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->
                        <div class="col-md-6 form-group">
                            <label for="sub_category" value="<?php echo e(__('sub_category')); ?>">Sub category</label>
                            <select class="form-control" id="sub_category" name="sub_category">
                                <option value="<?php echo e($blog->sub_category); ?>"><?php echo e($blog->sub_category); ?></option>
                                <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['sub_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="content" value="<?php echo e(__('content')); ?>">content</label>
                            <textarea class="form-control" id="content" name="content" required><?php echo $blog->content; ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="<?php echo e(__('image')); ?>">image</label>
                            <input type="file" class="form-control" value="<?php echo e(asset('assets/images/blogs')); ?>/<?php echo e($blog->image); ?>" id="image" name="image" required>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <img src="<?php echo e(asset('assets/images/blogs')); ?>/<?php echo e($blog->thumbnail); ?>" width="60" />

                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="<?php echo e(__('thumbnail')); ?>">thumbnail</label>
                            <input type="file" class="form-control" value="<?php echo e(asset('assets/images/blogs/thumbnails')); ?>/<?php echo e($blog->thumbnail); ?>" id="thumbnail" name="thumbnail" required>
                            <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <img src="<?php echo e(asset('assets/images/blogs/thumbnails')); ?>/<?php echo e($blog->thumbnail); ?>" width="60" />

                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option value="<?php echo e($blog->status); ?>"><?php echo e($blog->status); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured">Featured</label>
                            <select class="form-form-select" name="featured" id="featured">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Blog</span>
                            </button>
                        </div><!-- End .form-footer -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('content');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/blog/edit.blade.php ENDPATH**/ ?>