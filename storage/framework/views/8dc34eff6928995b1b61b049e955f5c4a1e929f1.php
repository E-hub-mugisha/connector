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
            <h6 class="m-0 font-weight-bold text-primary">Meet Our Service Providers </h6>
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
                            <th>Service Provider name</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sprovider->id); ?></td>
                            <td>
                                <?php if($sprovider->image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sprovider->image); ?>" alt="<?php echo e($sprovider->user->name); ?>" width="60" height="50">
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
                            <td><?php echo e($sprovider->user->location); ?></td>
                            <td><?php echo e($sprovider->status); ?></td>
                            <td><?php echo e($sprovider->created_at); ?></td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="activate(<?php echo e($sprovider->id); ?>)">Activate</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="deactivate(<?php echo e($sprovider->id); ?>)">DeActivate</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($sproviders->links()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\hile\hiletasker\resources\views/livewire/admin/admin-service-providers-component.blade.php ENDPATH**/ ?>