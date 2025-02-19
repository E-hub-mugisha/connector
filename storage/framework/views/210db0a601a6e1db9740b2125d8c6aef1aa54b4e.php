<div class="category-menu d-none d-lg-block">
    <ul class="style-none nav-item d-flex align-items-center justify-content-between">
        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug])); ?>"><?php echo e($scat->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">More</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="dropdown-item" href="<?php echo e(route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug])); ?>"><?php echo e($scat->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    </ul>
</div>
<section class="category-section-three category-section-three-category  pt-85 lg-pb-100">
    <div class="container">
        <div class="position-relative">
            <div class="row justify-content-between">
                <div class="col-md-6 col-sm-8">
                    <div class="title-one text-center text-sm-start">
                        <h2 class="fw-600">Most demanding job categories.</h2>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                    <div class="d-none d-sm-flex justify-content-sm-end mt-50">
                        <a href="<?php echo e(route('home.service_categories')); ?>" class="btn-six border-0">All Categories <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_23.svg')); ?>" alt="" class="lazy-img shapes"></a>
                    </div>
                </div>
            </div>
            <div class="card-wrapper justify-content-between mt-2 category-slider-one row">
                <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="card-style-four justify-items-center tran3s w-100 wow fadeInUp">
                        <a href="<?php echo e(route('home.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="d-block">
                            <div class="icon tran3s d-flex align-items-center justify-content-center">
                                <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/categories')); ?>/<?php echo e($scategory->image); ?>" alt="<?php echo e($scategory->name); ?>" class="lazy-img">
                            </div>
                            <div class="title tran3s fw-400 "><?php echo e($scategory->name); ?></div>
                            

                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- /.card-wrapper -->
            <ul class="slider-arrows slick-arrow-two d-flex justify-content-center style-none sm-mt-20">
                <li class="prev_d slick-arrow"><i class="bi bi-chevron-left"></i></li>
                <li class="next_d slick-arrow"><i class="bi bi-chevron-right"></i></li>
            </ul>
        </div>
    </div>
</section>
<!-- ./category-section-three --><?php /**PATH /home4/connector/public_html/hiletask/resources/views/pages/category.blade.php ENDPATH**/ ?>