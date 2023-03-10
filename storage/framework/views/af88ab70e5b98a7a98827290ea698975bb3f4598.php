<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="/" class="az-logo"><img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="HileTasker Logo" width="140" height="50"></a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="/" class="az-logo"><img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="HileTasker Logo" width="140" height="50"></a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item">
                    <a href="<?php echo e(route('sprovider.dashboard')); ?>" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Services</a>
                    <nav class="az-menu-sub">
                        <a href="<?php echo e(route('sprovider.add_service')); ?>" class="nav-link">Add Service</a>
                        <a href="<?php echo e(route('offerings.service')); ?>" class="nav-link">Services</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('sprovider.order')); ?>" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Bookings</a>
                </li>
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user"><img src="<?php echo e(asset('assets/sprovider/img/faces/face1.jpg')); ?>" alt=""></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <div class="az-img-user">
                            <img src="<?php echo e(asset('assets/sprovider/img/faces/face1.jpg')); ?>" alt="">
                        </div><!-- az-img-user -->
                        <h6><?php echo e(auth()->user()->name); ?></h6>
                        <span>Service Provider</span>
                    </div><!-- az-header-profile -->

                    <a href="<?php echo e(route('sprovider.profile')); ?>" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                    <a href="<?php echo e(route('sprovider.edit_profile')); ?>" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="typcn typcn-power-outline"></i> Sign Out
                        <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header --><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/sprovider/navbar.blade.php ENDPATH**/ ?>