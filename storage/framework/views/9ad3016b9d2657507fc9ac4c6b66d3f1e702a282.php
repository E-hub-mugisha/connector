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
            <h6 class="m-0 font-weight-bold text-primary">orders </h6>
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
                            <th>total</th>
                            <th>names</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $porders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $porder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($porder->id); ?></td>
                            <td>
                                <?php echo e($porder->total); ?>

                            </td>
                            <td><?php echo e($porder->names); ?></td>
                            <td><?php echo e($porder->email); ?></td>
                            <td>
                                <?php echo e($porder->phone); ?>

                            </td>
                            <td>
                                <?php echo e($porder->location); ?>

                            </td>
                            <td>
                                <?php if($porder->status == 'Delivered'): ?>
                                <span class="text-success"><?php echo e($porder->status); ?></span>
                                <?php elseif($porder->status == 'cancelled'): ?>
                                <span class="text-danger"><?php echo e($porder->status); ?></span>
                                <?php elseif($porder->status == 'ordered'): ?>
                                <span class="text-primary"><?php echo e($porder->status); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="action-col">
                                <a class="btn btn-primary" href="<?php echo e(route('admin.product_order_detail',['order_id'=>$porder->id])); ?> ">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($porders->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-product-orders-component.blade.php ENDPATH**/ ?>