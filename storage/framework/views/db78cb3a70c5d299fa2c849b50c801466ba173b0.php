<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta name='og:image' content='images/assets/ogg.png'>
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#244034">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#244034">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#244034">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name', 'connector')); ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="<?php echo e(asset('asset/images/fav-icon/fav-connector.png')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>" media="all">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/style.min.css')); ?>" media="all">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/responsive.css')); ?>" media="all">


</head>

<body>
    <div class="main-page-wrapper">
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main><!-- End .main -->
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('includes.loginPage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>

        <!-- Optional JavaScript _____________________________  -->

        <!-- jQuery first, then Bootstrap JS -->
        <!-- jQuery -->
        <script src="<?php echo e(asset('asset/vendor/jquery.min.js')); ?>"></script>
        <!-- Bootstrap JS -->
        <script src="<?php echo e(asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- WOW js -->
        <script src="<?php echo e(asset('asset/vendor/wow/wow.min.js')); ?>"></script>
        <!-- Slick Slider -->
        <script src="<?php echo e(asset('asset/vendor/slick/slick.min.js')); ?>"></script>
        <!-- Fancybox -->
        <script src="<?php echo e(asset('asset/vendor/fancybox/dist/jquery.fancybox.min.js')); ?>"></script>
        <!-- Lazy -->
        <script src="<?php echo e(asset('asset/vendor/jquery.lazy.min.js')); ?>"></script>
        <!-- js Counter -->
        <script src="<?php echo e(asset('asset/vendor/jquery.counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/vendor/jquery.waypoints.min.js')); ?>"></script>
        <!-- Nice Select -->
        <script src="<?php echo e(asset('asset/vendor/nice-select/jquery.nice-select.min.js')); ?>"></script>
        <!-- validator js -->
        <script src="<?php echo e(asset('asset/vendor/validator.js')); ?>"></script>

        <!-- Theme js -->
        <script src="<?php echo e(asset('asset/js/theme.js')); ?>"></script>
    </div> <!-- /.main-page-wrapper -->
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


</html><?php /**PATH D:\connector\well-known\hiletask\resources\views/layouts/base.blade.php ENDPATH**/ ?>