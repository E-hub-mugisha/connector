<div>
    
    <div class="dropdown az-header-notification">
        <a href="" class="new"><i class="typcn typcn-bell"></i></a>
        <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Booking Notifications</h6>
            <!-- <p class="az-notification-text">You have 2 unread notification</p> -->
            <div class="az-notification-list">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="media new">
                    <div class="media-body">
                        <p>New booking from <strong><?php echo e($order->names); ?></strong></p>
                        <span><?php echo e($order->date); ?> at <?php echo e($order->time); ?></span>
                    </div><!-- media-body -->
                </div><!-- media -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
        </div><!-- dropdown-menu -->
    </div><!-- az-header-notification -->
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/services-request-component.blade.php ENDPATH**/ ?>