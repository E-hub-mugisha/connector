<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="container">
            <h1 class="page-title">All Orders</h1>

            <div class="page-content">
                <div class="container">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>

                    <table class="table table-responsive table-wishlist table-mobile">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>provider name</th>
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


                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </div>
    </div>
</div><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/sprovider-order-component.blade.php ENDPATH**/ ?>