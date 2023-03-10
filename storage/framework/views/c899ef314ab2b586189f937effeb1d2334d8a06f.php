<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Services </h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($service->id); ?></td>
                            <td>
                                <a href="#">
                                    <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" alt="Product image" height="50" width="60">
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
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('admin.edit_service',['service_slug'=>$service->slug])); ?>">Edit</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService(<?php echo e($service->id); ?>)">Delete</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($services->links()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-services-component.blade.php ENDPATH**/ ?>