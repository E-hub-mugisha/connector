
<?php $__env->startSection('title', 'Service Booking'); ?>
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
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Service Booking List</h4>
                                                        <p class="card-subtitle card-subtitle-dash">Below is the list for service booked</p>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#addBookingModal"><i class="mdi mdi-account-plus"></i>Add new booking</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="addBookingModalLabel">Add New Booking</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="addBookingForm" method="POST" action="<?php echo e(route('service_bookings.store')); ?>">
                                                                            <?php echo csrf_field(); ?>

                                                                            <!-- Service Selection -->
                                                                            <div class="mb-3">
                                                                                <label for="service_id" class="form-label">Service</label>
                                                                                <select class="form-select" id="service_id" name="service_id" required>
                                                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Service Provider Selection -->
                                                                            <div class="mb-3">
                                                                                <label for="service_provider_id" class="form-label">Service Provider</label>
                                                                                <input class="form-control" id="service_provider_id" name="service_provider_id" value="<?php echo e($sprovider->id); ?>" required>

                                                                            </div>

                                                                            <!-- Total Amount -->
                                                                            <div class="mb-3">
                                                                                <label for="total" class="form-label">Total Amount</label>
                                                                                <input type="number" class="form-control" id="total" name="total" required>
                                                                            </div>

                                                                            <!-- Payment Mode -->
                                                                            <div class="mb-3">
                                                                                <label for="payment_mode" class="form-label">Payment Mode</label>
                                                                                <select class="form-select" id="payment_mode" name="payment_mode" required>
                                                                                    <option value="check-payment">Check payments</option>
                                                                                    <option value="Cash-on-delivery">Cash on delivery</option>
                                                                                    <option value="bank-transfer">Bank transfer</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Names -->
                                                                            <div class="mb-3">
                                                                                <label for="names" class="form-label">Names</label>
                                                                                <input type="text" class="form-control" id="name" name="name" required>
                                                                            </div>

                                                                            <!-- Email -->
                                                                            <div class="mb-3">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" id="email" name="email" required>
                                                                            </div>

                                                                            <!-- Phone -->
                                                                            <div class="mb-3">
                                                                                <label for="phone" class="form-label">Phone</label>
                                                                                <input type="text" class="form-control" id="phone" name="phone" required>
                                                                            </div>

                                                                            <!-- Location -->
                                                                            <div class="mb-3">
                                                                                <label for="location" class="form-label">Location</label>
                                                                                <input type="text" class="form-control" id="location" name="location" required>
                                                                            </div>

                                                                            <!-- Notes -->
                                                                            <div class="mb-3">
                                                                                <label for="notes" class="form-label">Notes</label>
                                                                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                                                            </div>

                                                                            <!-- Date -->
                                                                            <div class="mb-3">
                                                                                <label for="date" class="form-label">Date</label>
                                                                                <input type="date" class="form-control" id="date" name="date" required>
                                                                            </div>

                                                                            <!-- Time -->
                                                                            <div class="mb-3">
                                                                                <label for="time" class="form-label">Time</label>
                                                                                <input type="time" class="form-control" id="time" name="time" required>
                                                                            </div>

                                                                            <!-- Modal Footer with Submit Button -->
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save Booking</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="table-responsive  mt-1">
                                                    <table id="dataTable" class="table select-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Service</th>
                                                                <th>Price</th>
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
                                                                        <p><?php echo e($order->payment_mode); ?></p>
                                                                    </a>
                                                                </td>
                                                                <td><?php echo e($order->service->price); ?></td>
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
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/bookings/index.blade.php ENDPATH**/ ?>