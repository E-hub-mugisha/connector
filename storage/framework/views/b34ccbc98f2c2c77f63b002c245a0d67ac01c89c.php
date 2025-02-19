<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6B9080;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Connector</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Service Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage service category:</h6>
                <a class="collapse-item" href="<?php echo e(route('admin.service_categories')); ?>">Service Categories</a>
                <a class="collapse-item" href="<?php echo e(route('admin.sub_category')); ?>">Sub Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Services</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manager Service:</h6>
                <a class="collapse-item" href="<?php echo e(route('admin.all_services')); ?>">All Services</a>
                <a class="collapse-item" href="<?php echo e(route('admin.create_service')); ?>">Add Services</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sliders</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Sliders:</h6>
                <a class="collapse-item" href="<?php echo e(route('admin.slider')); ?>">All Sliders</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlogs" aria-expanded="true" aria-controls="collapseBlogs">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlogs" class="collapse" aria-labelledby="headingBlogs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Blogs:</h6>
                <a class="collapse-item" href="<?php echo e(route('admin.blogs')); ?>">Blogs</a>
                <a class="collapse-item" href="<?php echo e(route('admin.add_blog')); ?>">Add Blog</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.partners')); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Partners</span>
        </a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.bookings')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Service Bookings</span>
        </a>
    </li>
<li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.ProviderFeedback')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Service Provider Feedback</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.ProviderRatings')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Service Provider Ratings</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.service_providers')); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Service Providers</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.users')); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.newsletterSubscriptions.index')); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Newsletter Subscription</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.messages')); ?>">
            <i class="fas fa-fw fa-comment"></i>
            <span>Messages</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>