
<?php $__env->startSection('title', 'Services'); ?>
<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Services</h4>
                        </div>
                        <!--<div>-->
                        <!--    <a href="#" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add Service</a>-->
                        <!--</div>-->
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
    <thead>
        <tr>
            <th>Image</th>
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
                <img src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="img" height="50" width="50" />
            </td>
            <td><?php echo e($service->name); ?></td>
            <td><?php echo e($service->category->name); ?></td>
            <td class="text-danger"> <?php echo e($service->price); ?></td>
            <td>
                <?php if($service->status): ?>
                <label class="bg bg-success">Active</label>
                <?php else: ?>
                <label class="bg bg-danger">Inactive</label>
                <?php endif; ?>
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('CustomerService.show', $service->slug)); ?>">
                    <i class="fas fa-folder"></i> View Service
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
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/services/index.blade.php ENDPATH**/ ?>