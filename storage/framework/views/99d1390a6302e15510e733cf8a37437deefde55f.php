<section class="candidates-profile pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="ms-xxl-5 ms-xl-3">
                
                    <div class="accordion-box grid-style show">
                        <div class="row">
                            <div class="total-job-found">
                            <div class="heading heading-flex mb-3">
                                <div class="heading-left">
                                    <h2 class="title">Promotion Services For You</h2><!-- End .title -->
                                </div><!-- End .heading-left -->
                            </div>
                        </div>
                            <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Carbon\Carbon::now()->lessThanOrEqualTo($promotion->end_date)): ?>
                            
                            <div class="col-xxl-3 col-sm-6 d-flex">
                                <div class="candidate-profile-card favourite text-center grid-layout mb-25">
                                    <a href="<?php echo e(route('home.service_details',['service_slug'=>$promotion->service->slug])); ?>" class="save-btn badge-danger tran3s"><span class="bg-danger" style="padding: 5px; border-radius: 10px; color: white;"><?php echo e($promotion->discount); ?> % </span></a>
                                    <div class="cadidate-avatar online position-relative d-block m-auto"><a href="<?php echo e(route('home.service_details',['service_slug'=>$promotion->service->slug])); ?>" class="rounded-circle"><img src="images/lazy.svg" data-src="<?php echo e(asset('image/services')); ?>/<?php echo e($promotion->service->image); ?>" alt="" class="lazy-img rounded-circle"></a></div>
                                    <h4 class="candidate-name mt-15 mb-0"><a href="<?php echo e(route('home.service_details',['service_slug'=>$promotion->service->slug])); ?>" class="tran3s"><?php echo e($promotion->title); ?></a></h4>
                                    <div class="candidate-post"><?php echo e(Str::limit($promotion->description, 50 )); ?></div>
                                    <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
                                        <li><?php echo e($promotion->category->name); ?></li>
                                        <li class="more"><?php echo e($promotion->service->duration); ?></li>
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                    <div class="row gx-1">
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>Price</span>
                                                <div><?php echo e($promotion->service->price); ?> / RWF</div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>From:&nbsp;<?php echo e($promotion->start_date); ?></span>
                                                <div>End date:&nbsp;<span class="text-danger"><?php echo e($promotion->end_date); ?></span></div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                    </div>
                                    <div class="row gx-2 pt-25 sm-pt-10">
                                        <div class="col-md-6">
                                            <a href="<?php echo e(route('home.service_details',['service_slug'=>$promotion->service->slug])); ?>" class="profile-btn tran3s w-100 mt-5">View Service</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php echo e(route('home.booking',['service_slug'=>$promotion->service->slug])); ?>" class="msg-btn tran3s w-100 mt-5">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.candidate-profile-card -->
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.-->
            </div>
            <!-- /.col- -->
        </div>
    </div>
</section><?php /**PATH D:\connector\well-known\hiletask\resources\views/includes/promotions.blade.php ENDPATH**/ ?>