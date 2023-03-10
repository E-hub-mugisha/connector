<?php if (isset($component)) { $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a = $component; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BaseLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">About <span>HileTask</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-text text-center mt-3">
                            <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                            <p>HileTask is an online marketplace connecting service providers and customers in Kigali. We are
                                recognized as the most trustworthy online platform to the people of this city. With our
                                determination and dedication, we have won thousands of hearts in this city over the years and are
                                expanding to other cities of Rwanda. </p>
                            <img src="assets/images/about/about-2/signature.png" alt="signature" class="mx-auto mb-5">

                            <img src="assets/images/about/about-2/img-1.jpg" alt="image" class="mx-auto mb-6">
                        </div><!-- End .about-text -->
                    </div><!-- End .col-lg-10 offset-1 -->
                </div><!-- End .row -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-text text-center mt-3">
                            <h2 class="title text-center mb-2">What We Do?</h2><!-- End .title text-center mb-2 -->
                            <p>We aim to make services more accessible, efficient, and easy-on-the-pocket for our customers.
                                Along with this, we are also endeavoring to help thousands of local technicians in finding reliable
                                earning opportunities and make a good livelihood. Our mission is to make the booking of beauty,
                                plumbing, electrician, wedding, appliances, electronics, graphic &amp; design, HVAC, pest control, IT, car,
                                tutoring lessons, writing &amp; translation, fitness, painting, laundry, home automation, movers &amp;
                                packers, hospitality, cleaning, carpentry, and fixing services risk-free and guaranteed. During
                                registration process, we perform the background check and professional analysis of service
                                providers. Additionally, we offer trackable transaction process to accomplish sought-after user
                                experience and 100% satisfaction. </p>
                        </div><!-- End .about-text -->
                    </div><!-- End .col-lg-10 offset-1 -->
                </div><!-- End .row -->
                <div class="mt-3">
                    <h2 class="title text-center mb-2">How We Do It – Service provider?</h2>
                </div>
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                            <span class="icon-box-icon">
                                <i class="icon-puzzle-piece"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">1</h3><!-- End .icon-box-title -->
                                <p>HileTask is connecting service providers with users (customers) through our online platform. The
                                    customers and service providers can use our website and app (platforms), which are designed to
                                    make the booking of service providers more accessible and risk-free.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">2</h3><!-- End .icon-box-title -->
                                <p>To get registered as a service
                                    provider or signup as a customer at our platform, all you have to do is follow few simple steps and
                                    provide some basic information. Our hassle-free platforms have been crafted, keeping the unique
                                    needs of our users in mind.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                            <span class="icon-box-icon">
                                <i class="icon-heart-o"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Made With Love</h3><!-- End .icon-box-title -->
                                <p>With us, you can enjoy a stress-free online service that ensures 24/7
                                    responsiveness.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

            <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9" style="background-image: url(assets/images/backgrounds/bg-4.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="40" data-speed="3000" data-refresh-interval="50">0</span>k+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Happy Customer</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="3" data-speed="3000" data-refresh-interval="50">0</span>+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Years in Business</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="95" data-speed="3000" data-refresh-interval="50">0</span>%
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Return Clients</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="15" data-speed="3000" data-refresh-interval="50">0</span>
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Awards Won</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-image pt-8 pb-8 -->

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="about-text text-center mt-3">
                        <h2 class="title text-center mb-2">MISSION</h2><!-- End .title text-center mb-2 -->
                        <p>To empower the service business with the best digital solutions and Eco-Friendly while customers
                            have choices, convenience, affordability and help thousands of local service providers in finding
                            reliable earning opportunities and make a good livelihood. </p>
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->

            <!-- <div class="bg-light-2 pt-6 pb-7 mb-6">
                <div class="container">
                    <h2 class="title text-center mb-4">Meet Our Team</h2>

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-1.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Samanta Grey<span>Founder & CEO</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-2.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Bruce Sutton<span>Sales & Marketing Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-3.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Janet Joy<span>Product Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-4.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Mark Pocket<span>Product Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-5.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Damion Blue<span>Sales & Marketing Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-6.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Lenard Smith<span>Product Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-7.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">Rachel Green<span>Product Manager</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-8.jpg" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="member-content">
                                    <h3 class="member-title">David Doe<span>Product Manager</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="blog.html" class="btn btn-sm btn-minwidth-lg btn-outline-primary-2">
                            <span>LETS START WORK</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="brands-text text-center mx-auto mb-6">
                            <h2 class="title">The world's premium design brands in one destination.</h2>
                            <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nis</p>
                        </div>
                        <div class="brands-display">
                            <div class="row justify-content-center">
                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/1.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/2.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/3.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/7.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/4.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/5.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/6.png" alt="Brand Name">
                                    </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/9.png" alt="Brand Name">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a)): ?>
<?php $component = $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a; ?>
<?php unset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a); ?>
<?php endif; ?><?php /**PATH C:\Users\HP\Downloads\hiletask\hiletask\resources\views/about.blade.php ENDPATH**/ ?>