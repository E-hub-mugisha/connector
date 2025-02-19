<!--
		=====================================================
			Footer One
		=====================================================
		-->
<div class="footer-one">
    <div class="container">
        <div class="inner-wrapper">
            <div class="row">
                <div class="col-lg-2 col-md-3 footer-intro mb-15">
                    <div class="logo mb-15">
                        <a href="/" class="d-flex align-items-center">
                            <img src="<?php echo e(asset('asset/images/logo/logo-connector-footer.png')); ?>" alt="">
                        </a>
                    </div>
                    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_28.svg')); ?>" alt="" class="lazy-img mt-80 sm-mt-30 sm-mb-20">
                    <!-- logo -->
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Easy Way​</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="<?php echo e(route('home.services')); ?>">Browse Services</a></li>
                        <li><a href="<?php echo e(route('home.service_provider')); ?>">Service Providers</a></li>
                        <li><a href="<?php echo e(route('home.service_categories')); ?>">Service Categories</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Quick Link</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="/about">About us</a></li>
                        <li><a href="/blogs">Blogs</a></li>
                        <li><a href="<?php echo e(route('faq')); ?>">FAQ’s</a></li>
                        <li><a href="<?php echo e(route('home.contact')); ?>">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-20">
                    <h5 class="footer-title">Useful Link</h5>
                    <ul class="footer-nav-link style-none">
                        <li><a href="<?php echo e(route('terms')); ?>">Terms of use</a></li>
                        <li><a href="<?php echo e(route('terms')); ?>">Terms & conditions</a></li>
                        <li><a href="<?php echo e(route('policy')); ?>">Privacy</a></li>
                        <li><a href="<?php echo e(route('policy')); ?>">Cookie policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-20 footer-newsletter">
                    <h5 class="footer-title">Newsletter</h5>
                    <p>Join & get important new regularly</p>
                    <form action="<?php echo e(route('Subscriptions.store')); ?>" method="POST" class="d-flex">
                        <?php echo csrf_field(); ?>
                        <input type="email" name="email" id="email" placeholder="Enter your email*">
                        <button type="submit">Send</button>
                    </form>
                    <p class="note">We only send interesting and relevant emails.</p>
                </div>
            </div>
        </div> <!-- /.inner-wrapper -->
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-3 mb-15">
                    <ul class="style-none d-flex order-lg-last justify-content-center justify-content-lg-end social-icon">
                        <li><a href="https://wa.me/+250791957955" target="_blank"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a href="https://x.com/ConnectorRw" target="_blank"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="https://web.facebook.com/profile.php?id=100094526799428" target="_blank"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/connector.rw/" target="_blank"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-1 mb-15">
                    <ul class="d-flex style-none bottom-nav justify-content-center justify-content-lg-start">
                        <li><a href="<?php echo e(route('terms')); ?>">Privacy & Terms.</a></li>
                        <li><a href="<?php echo e(route('home.contact')); ?>"> Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2">
                    <p class="text-center mb-15">Copyright © <?php echo date("Y"); ?> connector</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.footer-one --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/includes/footer.blade.php ENDPATH**/ ?>