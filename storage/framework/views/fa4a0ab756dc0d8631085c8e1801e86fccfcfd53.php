<div>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Sales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo e($totalSales); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Revenue</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo e($totalRevenue); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalPending); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Bookings</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-wishlist table-mobile">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>order name</th>
                                    <th>Price</th>
                                    <th>Email</th>
                                    <th>name</th>
                                    <th>phone</th>
                                    <th>Date & time</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td class="product-col">
                                        <?php echo e($order->service_provider_id); ?>

                                    </td>
                                    <td class="price-col"><?php echo e($order->total); ?></td>
                                    <td class="stock-col"><?php echo e($order->email); ?></td>
                                    <td class="stock-col">
                                        <span class="in-stock"><?php echo e($order->names); ?></span>
                                    </td>
                                    <td class="price-col"><?php echo e($order->phone); ?></td>
                                    <td class="price-col"><?php echo e($order->date); ?> at <?php echo e($order->time); ?></td>
                                    <td class="stock-col">
                                        <span class="in-stock"><?php echo e($order->status); ?></span>
                                    </td>
                                    <td class="action-col">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-list-alt"></i>Select Options
                                            </button>

                                            <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?php echo e(route('sprovider.edit_order',['order_id'=>$order->id])); ?>">Detail</a>
                                                <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteOrder(<?php echo e($order->id); ?>)">Delete</a>
                                                <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="validateOrder(<?php echo e($order->id); ?>)">Approve</a>
                                                <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder(<?php echo e($order->id); ?>)">Cancel</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                    </div>
                </div>
            </div>

            <div class="col-lg-10 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Services</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Service</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($service->id); ?></td>
                                    <td>
                                        <a href="#">
                                            <img src="<?php echo e(asset('assets/images/products/thumbnails')); ?>/<?php echo e($service->thumbnail); ?>" alt="Product image" height="50" width="60">
                                        </a>
                                    </td>
                                    <td><?php echo e($service->name); ?></td>
                                    <td><?php echo e($service->category->name); ?></td>
                                    <td><?php echo e($service->price); ?></td>
                                    <td>
                                        <?php if($service->status): ?>
                                        Active
                                        <?php else: ?>
                                        Inactive
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($service->featured): ?>
                                        Yes
                                        <?php else: ?>
                                        No
                                        <?php endif; ?>
                                    </td>
                                    <td class="action-col">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-list-alt"></i>Select Options
                                            </button>

                                            <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?php echo e(route('sprovider.edit_service',['service_slug'=>$service->slug])); ?>">Edit</a>
                                                <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService(<?php echo e($service->id); ?>)">Delete</a>
                                                <a class="dropdown-item" href="#">The best option</a>
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
    </div>
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/sprovider-dashboard-component.blade.php ENDPATH**/ ?>