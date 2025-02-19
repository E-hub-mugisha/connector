<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'connector')); ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/feather/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/ti-icons/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/typicons/typicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/js/select.dataTables.min.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('stadmin/css/vertical-layout-light/style.css')); ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo e(asset('asset/images/fav-icon/fav-connector.png')); ?>" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="<?php echo e(asset('asset/images/logo/logo-connector-footer.png')); ?>" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="<?php echo e(asset('asset/images/fav-icon/fav-connector.png')); ?>" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Hello, <span class="text-black fw-bold"><?php echo e(auth()->user()->name); ?></span></h1>
                        <!-- <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-alert m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                    <p class="fw-light small-text mb-0"> Just now </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-settings m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                    <p class="fw-light small-text mb-0"> Private message </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3" href="<?php echo e(route('serviceProviderBooking.index')); ?>">
                                <p class="mb-0 font-weight-medium float-left">You have unread bookings</p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <?php
                            $sprovider = \App\Models\ServiceProvider::where('user_id', Auth::id())->first();
                            ?>
                            <?php if($sprovider): ?>
                            <?php $__currentLoopData = \App\Models\ServiceBooking::where('service_provider_id', $sprovider->id)->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item preview-item" href="<?php echo e(route('serviceProviderBooking.show', $booking->id)); ?>">
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">
                                        <?php echo e($booking->service->name ?? 'Service Name Unavailable'); ?>

                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        <?php echo e($booking->names ?? 'No Name Provided'); ?>

                                    </p>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <p class="dropdown-item text-center">No bookings available</p>
                            <?php endif; ?>
                        </div>

                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">

                                <p class="mb-1 mt-3 font-weight-semibold"><?php echo e(auth()->user()->name); ?></p>
                                <p class="fw-light text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
                            </div>
                            <a href="<?php echo e(route('sprovider.profile')); ?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a href="<?php echo e(route('sprovider.edit_profile')); ?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Edit</a>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                                <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                                    <?php echo csrf_field(); ?>
                                </form>Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('sprovider.dashboard')); ?>">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Services</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('serviceProvider.index')); ?>">My Services</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('serviceProvider.create')); ?>">Add Service</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Bookings</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('serviceProviderBooking.index')); ?>">Service Bookings</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('sprovider.portfolio')); ?>">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Portfolio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('sprovider.clients')); ?>">
                            <i class="menu-icon mdi mdi-account"></i>
                            <span class="menu-title">Clients</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('serviceProviderBlog.index')); ?>">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Blogs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('working_hours.index')); ?>">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Manage working hours</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('promotions.index')); ?>">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Manage promotions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('sprovider.media')); ?>" class="nav-link">
                            <span class="menu-title">Service Media</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                <?php echo $__env->yieldContent('content'); ?>
                <!-- content-wrapper ends -->

                <!-- Blade Conditional -->


                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Made by<a href="#" target="_blank">HOMIEZ</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <?php echo date("Y"); ?>. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?php echo e(asset('stadmin/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('stadmin/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/vendors/progressbar.js/progressbar.min.js')); ?>"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('stadmin/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/js/todolist.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo e(asset('stadmin/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('stadmin/js/Chart.roundedBarCharts.js')); ?>"></script>
    <!-- End custom js for this page-->

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS and export libraries -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "dom": 'Bfrtip', // Add this line to enable buttons
                "buttons": [
                    'excelHtml5',
                    'pdfHtml5',
                    'csvHtml5',
                    'print'
                ]
            });
        });
    </script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HWQ435LMGE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HWQ435LMGE');
    </script>
</body>

</html><?php /**PATH D:\connector\well-known\hiletask\resources\views/layouts/staradmin.blade.php ENDPATH**/ ?>