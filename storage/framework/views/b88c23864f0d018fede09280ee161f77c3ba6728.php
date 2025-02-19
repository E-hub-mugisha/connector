<!-- 
		=============================================
			Hero Banner
		============================================== 
		-->
<div class="hero-banner-six position-relative pt-170 lg-pt-150 pb-60 lg-pb-40">
    <div class="container">
        <div id="banner-six-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-bs-target="#banner-six-carousel" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index == 0 ? 'active' : ''); ?>"></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <div class="carousel-inner w-100 h-100">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                    <img src="<?php echo e(asset('image/slider')); ?>/<?php echo e($slider->image); ?>" class="d-block w-100" alt="Slide <?php echo e($index + 1); ?>" style="width: 100%;height: 100%;/* object-fit: cover; */ /* max-height: 600px; */">
                    <div class="carousel-caption d-md-block">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-9 col-lg-8 m-auto text-center">
                                <h1><?php echo e($slider->title); ?></h1>
                                 <p class="text-md text-white mt-25 mb-55 lg-mb-40">Discover Your Path to Prosperity – Connect with Trusted Experts Today!</p> 
                            </div>
                        </div>
                        <div class="row">
							<div class="col-xl-8 m-auto">
								<div class="row">
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter"><?php echo e($totalSales); ?></span>+</div>
											<p class="text-white">Total Sales</p>
										</div> <!-- /.counter-block-two -->
									</div>
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter"><?php echo e($totalSprovider); ?></span>+</div>
											<p class="text-white">Total Service Providers</p>
										</div> <!-- /.counter-block-two -->
									</div>
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" data-wow-delay="0.35s" style="visibility: visible; animation-delay: 0.35s; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter"><?php echo e($totalDone); ?></span>+</div>
											<p class="text-white">Total service Done</p>
										</div> <!-- /.counter-block-two -->
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner-six-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner-six-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


<!-- /.hero-banner-six --><?php /**PATH D:\connector\well-known\hiletask\resources\views/pages/hero.blade.php ENDPATH**/ ?>