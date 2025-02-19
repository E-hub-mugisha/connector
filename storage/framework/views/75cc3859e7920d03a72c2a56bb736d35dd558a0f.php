
<?php $__env->startSection('title', 'Client Details'); ?>
<?php $__env->startSection('content'); ?>


<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash"><?php echo e($clients->name); ?>'s Detail</h4>
                                                        <h5 class="card-subtitle card-subtitle-dash">Email: <?php echo e($clients->email); ?></h5>
                                                        <h5 class="card-subtitle card-subtitle-dash">Phone: <?php echo e($clients->phone); ?></h5>
                                                        <h5 class="card-subtitle card-subtitle-dash">Location: <?php echo e($clients->location); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Service Bookings by Status</h4>
                                                        <div class="chart-wrapper pb-4">
                                                            <canvas id="bookingsChart" width="200" height="200"></canvas>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Total service Requests</h4>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>View All</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Service</th>
                                                                <th>Names</th>
                                                                <th>Address</th>
                                                                <th>When</th>
                                                                <th>Status</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?php echo e(route('serviceProviderBooking.show',['id'=>$order->id])); ?>">
                                                                        <h6><?php echo e($order->service->name); ?></h6>
                                                                       
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->names); ?></h6>
                                                                    <p><?php echo e($order->email); ?></p>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->phone); ?></h6>
                                                                    <p><?php echo e($order->location); ?></p>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->date); ?></h6>
                                                                    <p><?php echo e($order->time); ?></p>
                                                                </td>
                                                                <td>
                                                                    <?php if($order->status == 'completed'): ?>
                                                                    <div class="badge badge-opacity-success"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "pending"): ?>
                                                                    <div class="badge badge-opacity-warning"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "approved"): ?>
                                                                    <div class="badge badge-opacity-primary"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "decline"): ?>
                                                                    <div class="badge badge-opacity-danger"><?php echo e($order->status); ?></div>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn badge badge-opacity-success btn-sm" href="<?php echo e(route('serviceProviderBooking.show', $order->id)); ?>">
                                                                        <i class="fas fa-folder">
                                                                        </i>
                                                                        View
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/customers/show.blade.php ENDPATH**/ ?>