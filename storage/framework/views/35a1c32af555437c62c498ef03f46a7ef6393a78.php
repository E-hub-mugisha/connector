<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>HileTask</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="HileTasker">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/images/icons/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('assets/images/icons/site.html')); ?>">
    <link rel="mask-icon" href="<?php echo e(asset('assets/images/icons/safari-pinned-tab.svg')); ?>" color="#666666">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <meta name="apple-mobile-web-app-title" content="HileTasker">
    <meta name="application-name" content="HileTasker">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="<?php echo e(asset('assets/images/icons/browserconfig.xml')); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')); ?>">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/owl-carousel/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/magnific-popup/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/jquery.countdown.css')); ?>">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/skins/skin-demo-4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demos/demo-4.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:+250 791 957 955"><i class="icon-phone"></i>Call: +250 791 957 955</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <?php if(Route::has('login')): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->utype==="ADM"): ?>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#"><?php echo e(auth()->user()->name); ?> (Admin)</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php elseif(Auth::user()->utype==="SVP"): ?>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#"><?php echo e(auth()->user()->name); ?> (Sprovider)</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="<?php echo e(route('sprovider.dashboard')); ?>">Dashboard</a></li>
                                                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php else: ?>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#"><?php echo e(auth()->user()->name); ?> (Customer)</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="<?php echo e(route('customer.dashboard')); ?>">Dashboard</a></li>
                                                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(route('login')); ?>">Sign in</a></li>
                                    <li><a href="<?php echo e(route('register')); ?>">Sign up</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="HileTask Logo" width="140" height="50">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form id="sform" action="<?php echo e(route('searchService')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control typeahead" name="q" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <a href="<?php echo e(route('shop.shop')); ?>" class="btn btn-primary btn-round"><span>Shop Now</span><i class="icon-long-arrow-right"></i></a>

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Service Providers <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <li class="item-lead"><a href="<?php echo e(route('home.service_provider')); ?>">All Service Providers</a></li>
                                        <?php $__currentLoopData = \App\Models\ServiceProvider::distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($sprovider->sprovider_name)): ?>
                                        <li><a href="<?php echo e(route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])); ?>"><?php if($sprovider->service_category_id): ?>
                                                <?php echo e($sprovider->category->name); ?>

                                                <?php endif; ?> </a></li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="/" class="sf">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('home.service_categories')); ?>" class="sf">Service Categories</a>

                                </li>
                                <li>
                                    <a href="<?php echo e(route('home.services')); ?>" class="sf">Services</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('home.blogs')); ?>" class="sf">Blog</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('home.contact')); ?>" class="sf">Contact us</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="icon-map-marker"></i>
                        <p>Kigali<span class="highlight">&nbsp;Rwanda</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->
        <main class="main">
            <?php echo e($slot); ?>

        </main><!-- End .main -->

        <footer class="footer">
            <!-- <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="cta-heading text-center">
                                <h3 class="cta-title text-white">Get The Latest Deals</h3>
                                <p class="cta-desc text-white">and receive <span class="font-weight-normal">$20 coupon</span> for first shopping</p>
                            </div>

                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="su_email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" class="footer-logo" alt="Footer Logo" width="150" height="50">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="/about">About HileTask</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="<?php echo e(route('home.contact')); ?>">Contact us</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="assets/documents/Hiletask terms of service.pdf">Terms and conditions</a></li>
                                    <li><a href="assets/documents/HileTask Privacy Policy.pdf">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact info</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="tel:+250 791 957 955"><i class="icon-phone"></i>Call: +250 791 957 955</a></li>
                                    <li><a href="mail-to:#"><i class="icon-envelope"></i>support@hiletask.com</a></li>
                                </ul><!-- End .widget-list -->
                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> HileTask. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="<?php echo e(asset('assets/images/payments.png')); ?>" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form id="sform" action="<?php echo e(route('searchService')); ?>" method="post" class="mobile-search">
                <?php echo csrf_field(); ?>
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control typeahead" name="q" id="q" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Service Providers</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('home.service_categories')); ?>">Service Categories</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('home.services')); ?>" class="sf">Services</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('home.blogs')); ?>">Blog</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('home.contact')); ?>">Contact us</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <li><a class="mobile-cats-lead" href="<?php echo e(route('home.service_provider')); ?>">All Service Providers</a></li>
                            <?php $__currentLoopData = \App\Models\ServiceProvider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($sprovider->sprovider_name)): ?>
                            <li><a href="<?php echo e(route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])); ?>"><?php if($sprovider->service_category_id): ?>
                                    <?php echo e($sprovider->category->name); ?>

                                    <?php endif; ?> </a></li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->


    <!-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" class="logo" alt="logo" width="100" height="50">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the HileTasker eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div>
                                </div>
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="<?php echo e(asset('assets/images/popup/newsletter/img-1.jpg')); ?>" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Plugins JS File -->
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.hoverIntent.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/superfish.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-input-spinner.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.plugin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/share.js')); ?>"></script>
    <!-- Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demos/demo-4.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "<?php echo e(route('autocomplete')); ?>";
        $('.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
    

    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html><?php /**PATH D:\hile\hiletasker\hiletask\resources\views/layouts/base.blade.php ENDPATH**/ ?>