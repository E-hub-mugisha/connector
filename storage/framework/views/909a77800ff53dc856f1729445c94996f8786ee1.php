<?php $__env->startSection('title','Service'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $__env->yieldContent('title'); ?> </h6>
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
                            <th>Service</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($service->id); ?></td>
                            <td>
                                <a href="#">
                                    <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="<?php echo e($service->name); ?>" height="50" width="60">
                                </a>
                            </td>
                            <td><?php echo e($service->name); ?></td>
                            <td><?php echo e($service->category->name); ?></td>
                            <td><?php echo e($service->price); ?></td>
                            <td>
                                <?php if($service->status): ?>
                                Active
                                <?php else: ?>
                                Inactive
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($service->featured): ?>
                                Yes
                                <?php else: ?>
                                No
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($service->created_at); ?></td>
                            <td class="action-col">
                                <a class="btn btn-info btn-circle" href="<?php echo e(route('admin.show_service',$service->slug)); ?>">view</a>
                                <a class="btn btn-info btn-circle" href="<?php echo e(route('admin.edit_service',$service->id)); ?>">Edit</a>
                                <form id="delete-form" action="<?php echo e(route('admin.delete_service',$service->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure you want to delete this service?')">

                                        <i class="fas fa-trash"></i>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/services/index.blade.php ENDPATH**/ ?>