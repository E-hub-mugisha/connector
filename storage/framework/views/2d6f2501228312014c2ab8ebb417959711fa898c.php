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
                    <img src="<?php echo e(asset('image/slider')); ?>/<?php echo e($slider->image); ?>" class="d-block w-100" alt="Slide <?php echo e($index + 1); ?>">
                    <div class="carousel-caption d-md-block">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-9 col-lg-8 m-auto text-center">
                                <h1><?php echo e($slider->title); ?></h1>
                                <!-- <p class="text-md text-white mt-25 mb-55 lg-mb-40">Unlock your potential with quality job & earn from world leading brands.</p> -->
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-9 m-auto">
                            <div class="job-search-one style-two position-relative me-xxl-3 ms-xxl-3 mb-5 lg-mb-50">
                                <form id="sform" action="<?php echo e(route('searchService')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="input-box">
                                                <div class="label">Your job title, keyword?</div>
                                                <input type="text" name="keyword" class="keyword typeahead">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <button class="fw-500 text-md h-100 w-100 tran3s search-btn-two">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 m-auto">
                                <div class="row">
                                    <?php $__currentLoopData = $fscategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-2">
                                        <div class="counter-block-two mt-15 text-center wow fadeInUp">
                                            <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="text-white"><?php echo e($scategory->name); ?></a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<!-- /.hero-banner-six --><?php /**PATH C:\Users\kabos\OneDrive\Desktop\jerome\hiletask\resources\views/pages/hero.blade.php ENDPATH**/ ?>