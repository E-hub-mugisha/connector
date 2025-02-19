<?php $__env->startSection('title','Service booking'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

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
                            <th>phone</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Date & time</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($booking->id); ?></td>
                            <td class="stock-col">
                                <span class="in-stock"><?php echo e($booking->names); ?></span>
                            </td>
                            <td class="price-col"><?php echo e($booking->phone); ?></td>
                            <td class="stock-col">
                                <span class="in-stock"><?php echo e($booking->status); ?></span>
                            </td>
                            <td class="price-col"><?php echo e($booking->total); ?></td>
                            
                            
                            <td class="price-col"><?php echo e($booking->date); ?> at <?php echo e($booking->time); ?></td>
                            
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('admin.show_booking', $booking->id)); ?>">view</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table><!-- End .table table-wishlist -->
            </div>
        </div><!-- End .page-content -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/bookings/index.blade.php ENDPATH**/ ?>