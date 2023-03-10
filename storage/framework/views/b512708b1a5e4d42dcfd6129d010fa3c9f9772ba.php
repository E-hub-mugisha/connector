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
            <h6 class="m-0 font-weight-bold text-primary">Meet Our Users </h6>
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
                            <th>User name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>UTYPE</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td>
                                <?php if($user->image): ?>
                                <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($user->image); ?>" alt="<?php echo e($user->name); ?>" width="60" height="50">
                                <?php else: ?>
                                <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($user->name); ?>" width="60" height="50">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($user->name); ?></td>
                            <td>

                                <?php echo e($user->email); ?>


                            </td>
                            <td><?php echo e($user->phone); ?></td>
                            <td><?php echo e($user->location); ?></td>
                            <td><?php echo e($user->utype); ?></td>
                            <td><?php echo e($user->created_at); ?></td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="adminActivate(<?php echo e($user->id); ?>)">Activate Admin</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="customerActivate(<?php echo e($user->id); ?>)">Activate Customer</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($users->links()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-users-component.blade.php ENDPATH**/ ?>