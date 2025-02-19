<?php $__env->startSection('title','Service Provider'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Provider</h1>
        <a href="<?php echo e(route('admin.AddServiceProviders')); ?>" class="btn btn-primary" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Service Provider</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Our Service Providers </h6>
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
                            <th>name</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sprovider->id); ?></td>
                            <td>
                                <?php if($sprovider->image): ?>
                                <img src="<?php echo e(asset('image/profile')); ?>/<?php echo e($sprovider->image); ?>" alt="<?php echo e($sprovider->user->name); ?>" width="60" height="50">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($sprovider->user->name); ?>" width="60" height="50">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($sprovider->user->name); ?></td>
                            <td>
                                <?php if($sprovider->service_category_id): ?>
                                <?php echo e($sprovider->category->name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($sprovider->user->phone); ?></td>
                            <td><?php echo e($sprovider->service_locations); ?></td>
                            <td><?php echo e($sprovider->status); ?></td>
                            <td><?php echo e($sprovider->created_at); ?></td>
                            <td class="action-col">
                                <a class="btn btn-sm" href="<?php echo e(route('admin.ShowServiceProviders',$sprovider->id)); ?>">
                                    <span class="btn btn-sm badge-info">Show</span>
                                </a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/service-provider/index.blade.php ENDPATH**/ ?>