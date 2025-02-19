
<?php $__env->startSection('title','Create Blog'); ?>
<?php $__env->startSection('content'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.blog_create')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="title" value="<?php echo e(__('title')); ?>">title *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="blog_category" value="<?php echo e(__('blog_category')); ?>">blog category</label>
                            <select class="form-control" id="blog_category" name="blog_category">
                                <option value="">-- select blog category --</option>
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
                        <div class="form-group">
                            <label for="sub_category" value="<?php echo e(__('sub_category')); ?>">Sub category</label>
                            <select class="form-control" id="sub_category" name="sub_category">
                                <option value="">-- select sub category --</option>
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
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="declined">Declined</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured">Featured</label>
                            <select class="form-control" name="featured" id="featured">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content" value="<?php echo e(__('content')); ?>">content</label>
                            <textarea class="form-control" id="content" name="content" ></textarea>
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
                            <input type="file" class="form-control" id="image" name="image" required>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="<?php echo e(__('thumbnail')); ?>">thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                            <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">

                                <span class="text">create Blog</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Initialize Summernote -->
<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/blogs/create.blade.php ENDPATH**/ ?>