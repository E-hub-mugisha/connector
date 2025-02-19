<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <?php $__currentLoopData = \App\Models\ServiceBooking::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?php echo e($bookings->created_at); ?></div>
                        <span class="font-weight-bold"><?php echo e($bookings->names); ?> || <?php echo e($bookings->location); ?></span>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?php echo e(route('admin.bookings')); ?>">Show All Bookings</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <?php $__currentLoopData = \App\Models\Contact::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('admin.messageDetail',$contacts->id)); ?>">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">New message</div>
                        <div class="small text-gray-500"><?php echo e($contacts->name); ?> | <?php echo e($contacts->created_at); ?></div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?php echo e(route('admin.messages')); ?>">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(auth()->user()->name); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo e(asset('admin/img/undraw_profile.svg')); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#aboutModal" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel">Profile</h4>
                        </div>
                        <div class="modal-body">
                            <center>
                                <img class="img-profile rounded-circle" src="<?php echo e(asset('admin/img/undraw_profile.svg')); ?>" name="aboutme" width="140" height="140" ></a>
                                <h3 class="media-heading"><?php echo e(auth()->user()->name); ?></h3>
                                <span><strong>Location: </strong></span>
                                <span class="label label-warning"><?php echo e(auth()->user()->location); ?></span>
                            </center>
                            <hr>
                            <center>
                                <p class="text-left"><strong>Phone: </strong><br>
                                <?php echo e(auth()->user()->phone); ?>

                                </p>
                                <br>
                                <p class="text-left"><strong>Email: </strong><br>
                                <?php echo e(auth()->user()->email); ?>

                                </p>
                                <br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about <?php echo e(auth()->user()->name); ?></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/includes/navbar.blade.php ENDPATH**/ ?>