<?php $__env->startSection('title','Message Detail'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.messages')); ?>" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-20">
                    <div class="mailbox-read-info">
                        <h5><?php echo e($message->subject); ?></h5>
                        <h6>From: <?php echo e($message->email); ?>

                            <span class="mailbox-read-time float-right"><?php echo e($message->created_at); ?></span>
                        </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <form id="delete-form" action="<?php echo e(route('admin.delete_message', $message->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">

                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            <a href="mailto:<?php echo e($message->email); ?>" type="button" class="btn btn-success btn-sm" data-container="body" title="Reply">
                                <i class="fas fa-reply"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p><?php echo e($message->message); ?></p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/messages/show.blade.php ENDPATH**/ ?>