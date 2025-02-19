<?php $__env->startSection('title','Newsletter'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <a href="<?php echo e(route('admin.newsletterSubscriptions.create')); ?>" type="button" class="btn btn-primary btn-sm m-2">
        Create New Subscription
    </a>
    <a href="<?php echo e(route('admin.newsletterSubscriptions.send')); ?>" type="button" class="btn btn-warning btn-sm m-2">Send Newsletter</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Newsletter Subscriptions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($subscription->email); ?></td>
                            <td><?php echo e($subscription->created_at); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.newsletterSubscriptions.show', $subscription->id)); ?>" class="btn btn-sm"><span class="badge badge-success">Show</span></a>
                                <a href="<?php echo e(route('admin.newsletterSubscriptions.edit', $subscription->id)); ?>" class="btn btn-sm"><span class="badge badge-info">Edit</span></a>
                                <form action="<?php echo e(route('admin.newsletterSubscriptions.destroy', $subscription->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm"><span class="badge badge-danger">Delete</span></button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/newsletters/index.blade.php ENDPATH**/ ?>