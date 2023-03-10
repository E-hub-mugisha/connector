<div>
    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                        <?php endif; ?>
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Your Order is <span style="color: #a8729a;"><?php echo e($porder->status); ?></span>!</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                            </div>
                            <?php $__currentLoopData = $porder->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-fluid" alt="Phone">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"><?php echo e($items->product->name); ?></p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">White</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Price: <?php echo e($items->price); ?></p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Qty: <?php echo e($items->quantity); ?></p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">$<?php echo e($items->price * $items->quantity); ?></p>
                                        </div>
                                    </div>
                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-2">
                                            <p class="text-muted mb-0 small">Track Order</p>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                                <div class="progress-bar" role="progressbar" style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-around mb-1">
                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex justify-content-between pt-2">
                                <h3 class="fw-bold mb-0">Bill Details</h3>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-muted mb-0">Invoice Number : <?php echo e($porder->id); ?></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Names : <?php echo e($porder->names); ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Email : <?php echo e($porder->email); ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Phone : <?php echo e($porder->phone); ?></p>
                            </div>

                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Location : <?php echo e($porder->location); ?></p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Order Note : <?php echo e($porder->notes); ?></p>
                            </div>
                            <div class="d-flex justify-content-between pt-2">
                                <h3 class="text-center fw-bold mb-0">Transaction Details</h3>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Transaction Date : <?php echo e($porder->created_at); ?></p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4"></span></p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Status : <?php echo e($porder->status); ?></p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Payment Mode : <?php echo e($porder->payment_mode); ?></p>
                            </div>
                        </div>
                        <div class="card-footer border-0 px-4 py-5" style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

                            <span class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">SubTotal: <span class="h4 mb-0 ms-2">$<?php echo e($porder->subtotal); ?></span></span>
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                paid: <span class="h2 mb-0 ms-2">$<?php echo e($porder->total); ?></span></h5>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">

                            <a href="<?php echo e(route('admin.product_order')); ?>" type="button" class="btn btn-primary px-3"><i class="fas fa-reply" aria-hidden="true"></i>Back</a>
                            <a onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="deliveredOrder(<?php echo e($porder->id); ?>)" type="button" class="btn btn-success px-3"><i class="far fa-thumbs-up" aria-hidden="true"></i>Accept</a>
                            <a onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder(<?php echo e($porder->id); ?>)" type="button" class="btn btn-danger px-3"><i class="fas fa-bolt" aria-hidden="true"></i>Cancel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-product-orders-detail-component.blade.php ENDPATH**/ ?>