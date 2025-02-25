
<?php $__env->startSection('title', 'Services'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Services</h4>
                        </div>
                        <div>
                            <a href="<?php echo e(route('serviceProvider.create')); ?>" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add Service</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th>Service Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="py-1">
                                        <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="<?php echo e($service->name); ?>" height="50" width="50"/>
                                    </td>
                                    <td><?php echo e($service->name); ?></td>
                                    <td><?php echo e($service->category->name); ?></td>
                                    <td class="text-danger"> <?php echo e($service->price); ?> <i class="ti-arrow-down"></i></td>
                                    <td>
                                        <?php if($service->status): ?>
                                        <label class="badge badge-success">Active</label>
                                        <?php else: ?>
                                        <label class="badge badge-danger">Inactive</label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('serviceProvider.show', $service->slug)); ?>">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <form id="delete-form" action="<?php echo e(route('serviceProvider.destroy', $service->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">
                                                <i class="mdi mdi-delete"> </i></button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/stadmin/services/index.blade.php ENDPATH**/ ?>