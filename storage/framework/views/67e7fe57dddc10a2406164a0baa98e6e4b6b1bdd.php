
<?php $__env->startSection('title', 'Service providers'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">


    <!-- User providers Section -->
    <div class="card bg-white card-box border-20 mb-4">
        <h3 class="dash-title-three"><?php echo $__env->yieldContent('title'); ?></h3>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Service location</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="py-1">
                <img src="<?php echo e(asset('image/profile')); ?>/<?php echo e($provider->image); ?>" alt="image" height="50" width="50" />
            </td>
                    <td><?php echo e($provider->sprovider_name); ?></td>
                    <td><?php echo e($provider->proEmail); ?></td>
                    <td><?php echo e($provider->city); ?></td>
                    <td><?php echo e($provider->service_locations); ?></td>
                    <td><?php echo e($provider->category->name); ?></td>
                    <td><?php echo e($provider->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('customer.ServiceProviderDetail', $provider->id)); ?>" class="btn btn-info btn-sm">View</a>
                        <!--<a href="#" class="btn btn-warning btn-sm">Edit</a>-->
                        <a href="<?php echo e(route('customer.ServiceProviderService', $provider->id)); ?>"
                            class="btn btn-info btn-sm">services</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/providers/index.blade.php ENDPATH**/ ?>