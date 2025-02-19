<?php $__env->startSection('title','Users'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
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
                            <th>UTYPE</th>
                            <th>Created at</th>
                            <th>Action</th>
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
                            <td><?php echo e($user->utype); ?></td>
                            <td><?php echo e($user->created_at); ?></td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('admin.activate', $user->id)); ?>" 
   onclick="return confirm('Are you sure you want to activate this user as an admin?');">
    <span class="badge badge-primary">Activate Admin</span>
</a>

<a class="dropdown-item" href="<?php echo e(route('customer.activate', $user->id)); ?>" 
   onclick="return confirm('Are you sure you want to activate this user as a customer?');">
    <span class="badge badge-success">Activate Customer</span>
</a>

<a class="dropdown-item" href="<?php echo e(route('provider.activate', $user->id)); ?>" 
   onclick="return confirm('Are you sure you want to activate this user as a service provider?');">
    <span class="badge badge-warning">Activate Provider</span>
</a>

                                        <form id="delete-form" action="<?php echo e(route('users.delete',$user->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <span class="badge badge-danger">Delete User</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/users/index.blade.php ENDPATH**/ ?>