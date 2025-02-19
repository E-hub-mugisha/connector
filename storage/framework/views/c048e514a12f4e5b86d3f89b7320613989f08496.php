<?php $__env->startSection('title','Sliders'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <button type="button" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#SliderModal">
        Add Slider
    </button>
    <!-- add Slider Modal-->
    <div class="modal fade" id="SliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('admin.add_slider')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" value="<?php echo e(__('slider title')); ?>">slider title *</label>
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
                            <label for="status" value="<?php echo e(__('status')); ?>">status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="<?php echo e(__('slider image')); ?>">slider image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div><!-- End .form-group -->

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Add Slider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sliders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Slider name</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($slider->id); ?></td>
                            <td>
                                <a href="#">
                                    <img src="<?php echo e(asset('image/slider')); ?>/<?php echo e($slider->image); ?>" alt="<?php echo e($slider->title); ?>" height="50" width="60">
                                </a>
                            </td>
                            <td>
                                <a href="#"><?php echo e($slider->title); ?></a>
                            </td>
                            <td>
                                <?php if($slider->status): ?>
                                Active
                                <?php else: ?>
                                Inactive
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($slider->created_at); ?></td>
                            <td class="action-col">
                                <a href="<?php echo e(route('admin.edit_slider', $slider->id)); ?>"><span class="btn btn-sm badge-info">Edit</span></a>
                                <form id="delete-form" action="<?php echo e(route('admin.delete_slider',$slider->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this slider?')">

                                        <span class="badge-danger">Delete</span>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/sliders/index.blade.php ENDPATH**/ ?>