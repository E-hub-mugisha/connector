<!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
                <div class="profile-notification ms-2 ms-md-5 me-4">
                    <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                <?php $__currentLoopData = \App\Models\ServiceBooking::where('user_id', Auth::user()->id)->take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex align-items-center unread">
                                    <a href="<?php echo e(route('ServiceBookedDetail', $booking->id)); ?>">
                                    <div class="flex-fill ps-2">
                                        <h6><?php echo e($booking->service->name); ?></h6>
                                        <span class="time"><?php echo e($booking->status); ?></span>
                                        <span class="time"><?php echo e($booking->date); ?></span>
                                    </div>
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="<?php echo e(route('customer.services')); ?>" class="job-post-btn tran3s">Book Service</a></div>
            </div>
        </header>
        <!-- End Header --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/customers/includes/navbar.blade.php ENDPATH**/ ?>