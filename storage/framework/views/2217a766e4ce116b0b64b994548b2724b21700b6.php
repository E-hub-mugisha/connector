<?php $__env->startSection('title','Provider Feedbacks'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Provider Feedback</h1>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Our Service Providers Feedback</h6>
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
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($feedback->id); ?></td>
                            <td><?php echo e($feedback->name); ?></td>
                            <td>
                                <?php echo e($feedback->email); ?>

                                
                            </td>
                            <td><?php echo e($feedback->message); ?></td>
                            <td><?php if($feedback->approved == 1 ): ?>
                            <span class="badge badge-success">Approved</span>
                            <?php else: ?>
                            <span class="badge badge-warning">Pending</span>
                            <?php endif; ?>
                            </td>
                            <td><?php echo e($feedback->created_at); ?></td>
                            <td class="action-col">
                                <form id="approve-form" action="<?php echo e(route('admin.feedbackApprove', $feedback->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this Feedback?')">
                                    Approve</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/provider-feedback/index.blade.php ENDPATH**/ ?>