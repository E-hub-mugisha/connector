<?php $__env->startSection('title','Messages'); ?>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Phone</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($message->name); ?></td>
                            <td>
                                <a href="mailto:<?php echo e($message->email); ?>"><?php echo e($message->email); ?></a>
                            </td>
                            <td><?php echo e(Str::limit($message->subject, 50)); ?></td>
                            <td><?php echo e(Str::limit($message->message, 50)); ?></td>
                            <td><?php echo e($message->phone); ?></td>
                            <td><?php echo e($message->created_at); ?></td>
                            <td class="action-col">
                                <a class="btn btn-info" href="<?php echo e(route('admin.messageDetail',$message->id)); ?>"><span class="btn btn-sm badge-info">view</span></a>
                                <form id="delete-form" action="<?php echo e(route('admin.delete_message', $message->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">

                                        <span class="btn btn-sm badge-danger">delete</span>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/messages/index.blade.php ENDPATH**/ ?>