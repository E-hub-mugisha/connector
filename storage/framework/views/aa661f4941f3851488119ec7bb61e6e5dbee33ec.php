<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'HileTask')); ?></title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/fav.png')); ?>">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/owl-carousel/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/magnific-popup/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/nouislider/nouislider.css')); ?>">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/skins/skin-demo-13.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demos/demo-13.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body>
    <div class="page-wrapper">
        <header class="header header-10 header-intro-clearance">
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
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt=" Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="<?php echo e(route('searchProduct')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="header-search-wrapper search-wrapper-wide">

                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control typeahead" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="header-dropdown-link">

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <?php if(Cart::count() > 0 ): ?>
                                    <span class="cart-count"><?php echo e(Cart::count()); ?></span>
                                    <?php endif; ?>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                        <?php if(Cart::count() > 0 ): ?>
                                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="#"><?php echo e($item->model->name); ?></a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    x $<?php echo e($item->Subtotal()); ?>

                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="#" class="product-image">
                                                    <img src="<?php echo e(asset('assets/images/products')); ?>/<?php echo e($item->model->image); ?>" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product" wire:click.prevent="destroy('<?php echo e($item->rowId); ?>')"><i class="icon-close"></i></a>
                                        </div><!-- End .product -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">$<?php echo e(Cart::total()); ?></span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="<?php echo e(route('product.cart')); ?>" class="btn btn-primary">View Cart</a>
                                        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .cart-dropdown -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="megamenu-container <?php echo e(count($category->subcategories) > 0 ? 'has-child-cate':''); ?>">
                                            <a class="sf-with-ul" href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>"><?php echo e($category->name); ?></a>
                                            <?php if(count($category->subcategories)>0): ?>
                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-md-6">
                                                                    <div class="menu-title"><?php echo e($category->name); ?></div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="<?php echo e(route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])); ?>"><?php echo e($scategory->name); ?></a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                    <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="<?php echo e(route('product.category',['category_slug'=>$category->slug])); ?>" class="banner banner-menu">
                                                                <img src="<?php echo e(asset('assets/images/category/products')); ?>/<?php echo e($category->image); ?>" alt="<?php echo e($category->name); ?>">
                                                            </a>
                                                        </div><!-- End .banner banner-overlay -->
                                                    </div><!-- End .col-md-4 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .megamenu -->
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .col-lg-3 -->
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="/" class="sf">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('shop.shop')); ?>" class="sf">Shop</a>
                                </li>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#" class="sf text-white">Brands</a>
                                        <div class="header-menu">
                                            <ul>
                                                <?php $__currentLoopData = \App\Models\Product::query('brand')->distinct('brand')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('product.brand',['brand'=>$product->brand])); ?>"><?php echo e($product->brand); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('home.contact')); ?>" class="sf">Contact</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .col-lg-9 -->
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
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">About Hiletask</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="<?php echo e(route('home.contact')); ?>">Contact us</a></li>
                                    <li><a href="<?php echo e(route('login')); ?>">Log in</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="<?php echo e(route('terms')); ?>">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="<?php echo e(route('login')); ?>">Sign In</a></li>
                                    <li><a href="<?php echo e(route('product.cart')); ?>">View Cart</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2022 HileTask. All Rights Reserved.</p><!-- End .footer-copyright -->
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

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('shop.shop')); ?>">Shop</a>
                    </li>
                    <li>
                        <div class="header-dropdown">
                            <a href="#" class="sf text-white">Brands</a>
                            <div class="header-menu">
                                <ul>
                                    <?php $__currentLoopData = \App\Models\Product::query('brand')->distinct('brand')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('product.brand',['brand'=>$product->brand])); ?>"><?php echo e($product->brand); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo e(route('home.contact')); ?>" class="sf">Contact</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="email" value="<?php echo e(__('Email')); ?>">Username or email address *</label>
                                            <input type="text" class="form-control" id="email" name="email" required :value="old('email')" required autofocus>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="password-2" value="<?php echo e(__('Password')); ?>">Password *</label>
                                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember_me">
                                                <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <?php if(Route::has('password.request')): ?>
                                            <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">Forgot Your Password?</a>
                                            <?php echo e(__('Forgot your password?')); ?>

                                            </a>
                                            <?php endif; ?>


                                        </div><!-- End .form-footer -->
                                    </form>
                                    <!-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form method="POST" action="<?php echo e(route('register')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <div>
                                            <label for="name" value="<?php echo e(__('Name')); ?>">Your Names</label>
                                            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        </div>

                                        <div class="mt-4">
                                            <label for="email" value="<?php echo e(__('Email')); ?>">Your Email</label>
                                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="phone" value="<?php echo e(__('phone')); ?>">Your phone</label>
                                            <input id="phone" class="form-control" type="text" name="phone" required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="utype" value="<?php echo e(__('Register as')); ?>">Register as</label>
                                            <select id="registeras" class="form-control" name="registeras">
                                                <option value="CST">Customer</option>
                                                <option value="SVP">Service Provider</option>
                                            </select>
                                        </div>

                                        <div class="mt-4">
                                            <label for="password" value="<?php echo e(__('Password')); ?>">Your Password</label>
                                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <label for="password_confirmation" value="<?php echo e(__('Confirm Password')); ?>">Confirm Password</label>
                                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <?php if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()): ?>
                                        <div class="mt-4">
                                            <label for="terms">
                                                <div class="flex items-center">
                                                    <checkbox name="terms" id="terms" />

                                                    <div class="ml-2">
                                                        <?php echo __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                        ]); ?>

                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <?php endif; ?>

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('login')); ?>">
                                                <?php echo e(__('Already registered?')); ?>

                                            </a>

                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Sign Up</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.hoverIntent.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/superfish.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-input-spinner.js')); ?>"></script>
    <!-- Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "<?php echo e(route('productAutocomplete')); ?>";
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


<!-- Hiletasker/cart.html  22 Nov 2019 09:55:06 GMT -->

</html><?php /**PATH /home4/connector/public_html/hiletask/resources/views/components/shop.blade.php ENDPATH**/ ?>