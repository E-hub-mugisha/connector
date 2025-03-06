<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .carousel-item {
        text-align: center;
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    .carousel-item p {
        font-size: 1.2em;
        color: #333;
    }

    .carousel-item small {
        color: #666;
    }

    .rating {
        direction: rtl;
        font-size: 2rem;
    }

    .rating input {
        display: none;
    }

    .rating label {
        color: #006400;
        /* Dark green for unselected stars */
        cursor: pointer;
        font-size: 2.5rem;
    }

    /* Star color when hovered or selected */
    .rating label:hover,
    .rating label:hover~label,
    .rating input:checked~label {
        color: #FFD700;
        /* Gold for selected or hovered stars */
    }

    .rating input:checked+label,
    .rating input:checked+label~label {
        color: #FFD700;
        /* Gold for selected stars */
    }

    .average-rating {
        font-size: 1.5rem;
        color: #FFD700;
        /* Gold color for stars */
    }
</style>

<!-- 
        =============================================
            Inner Banner
        ============================================== 
        -->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-6 m-auto text-center">
                    <div class="title-two">
                        <h2 class="text-white"><?php echo e($sproviders->sprovider_name); ?></h2>
                    </div>
                    <ul class="style-none d-flex justify-content-center page-pagination mt-15">
                        <li><a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i></li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_02.svg')); ?>" alt="" class="lazy-img shapes shape_01">
    <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('asset/images/shape/shape_03.svg')); ?>" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->

<!-- 
        =============================================
            Candidates Profile Details
        ============================================== 
        -->
<section class="candidates-profile pt-100 lg-pt-70 pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <!-- Sidebar with profile details -->
                <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                    <div class="cadidate-bio bg-wrapper bg-color mb-6 md-mb-40">
                        <div class="pt-25">
                            <div class="cadidate-avatar m-auto">
                                <img src="<?php echo e(asset('asset/images/lazy.svg')); ?>" data-src="<?php echo e(asset('image/profile')); ?>/<?php echo e($sproviders->image); ?>" alt="" class="lazy-img rounded-circle w-100">
                            </div>
                        </div>
                        <h3 class="cadidate-name text-center"><?php echo e($sproviders->sprovider_name); ?></h3>
                        <div class="text-center pb-25">
                            <?php if($sproviders->service_category_id): ?>
                            <?php echo e($sproviders->category->name); ?>

                            <?php endif; ?>
                        </div>
                        <ul class="style-none">
                            <li>
                                <span>Phone: </span>
                                <div><a href="tel:<?php echo e($sproviders->user->phone); ?>"><?php echo e($sproviders->user->phone); ?></a></div>
                            </li>
                            <li><span>Location: </span>
                                <div><?php echo e($sproviders->city); ?> </div>
                            </li>
                            <li><span>Total Served: </span>
                                <div><?php $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sproviders->id)->where('status','completed')->count(); ?></div><span><?php echo e($totalSales); ?></span>
                            </li>
                            <li><span>Email: </span>
                                <div><a href="mailto:<?php echo e($sproviders->proEmail); ?>"><?php echo e($sproviders->proEmail); ?></a></div>
                            </li>
                            <li>
                                <span>Overall Rating: </span>
                                <div>
                                    <span class="average-rating">
                                        <?php echo e($averageRating); ?>/5
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if($i <=floor($averageRating)): ?>
                                            ★
                                            <?php elseif($i==ceil($averageRating) && $averageRating - floor($averageRating)> 0): ?>
                                            <span style="color: #FFD700;">&#9733;</span> <!-- Half star in gold -->
                                            <?php else: ?>
                                            <span style="color: #ddd;">★</span> <!-- Unfilled star -->
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                    </span>
                                </div>
                            </li>
                            <li><span>Social:</span>
                                <div>
                                    <a href="#" class="me-3" onclick="shareOnFacebook()"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnWhatsApp()"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnInstagram()"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnTwitter()"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnLinkedIn()"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </li>
                        </ul>
                        <a href="#sendEmail" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Send email</a>
                    </div>
                    <!-- /.cadidate-bio -->

                    <!-- Working Hours Section -->
                    <!-- Working Hours Section -->
                    <h4 class="sidebar-title">Working Hours</h4>
                    <div class="working-hours bg-wrapper bg-color mb-6 md-mb-40">
                        <ul class="style-none">
                            <?php $__currentLoopData = $workingHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workingHour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <span><?php echo e(\Carbon\Carbon::parse($workingHour->day)->format('l')); ?>:</span>
                                <?php if($workingHour->is_closed): ?>
                                Closed
                                <?php else: ?>
                                <?php echo e(\Carbon\Carbon::parse($workingHour->start_time)->format('h:i A')); ?> - <?php echo e(\Carbon\Carbon::parse($workingHour->end_time)->format('h:i A')); ?>

                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>


                    <!-- Location Section -->
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=<?php echo e($sproviders->city); ?>&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <!-- Email Form -->
                    <h4 class="sidebar-title">Email <?php echo e($sproviders->sprovider_name); ?>.</h4>
                    <div class="email-form bg-wrapper bg-color" id="sendEmail">
                        <p>Your email address & profile will be shown to the recipient.</p>
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                        <?php endif; ?>
                        <form action="/sendEmailInquiry" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="d-sm-flex mb-25">
                                <label for="">Name</label>
                                <input type="text" placeholder="Your Name*" name="name" id="name" required="required">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email *" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex mb-25">
                                <input type="text" class="form-control" id="proEmail" value="<?php echo e($sproviders->proEmail); ?>" name="proEmail" placeholder="Email *" required hidden>
                                <?php $__errorArgs = ['proEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex mb-25 xs-mb-10">
                                <label for="">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="d-sm-flex">
                                <label for=""></label>
                                <button type="submit" class="btn-ten fw-500 text-white flex-fill text-center tran3s">Send </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.cadidate-profile-sidebar -->
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">
                    <!-- Overview Section -->
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">About</h3>
                        <p><?php echo $sproviders->about; ?></p>
                    </div>

                    <?php if(!empty($sproviders->skills)): ?>
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Skills</h3>
                        <p><?php echo $sproviders->skills; ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($sproviders->qualification)): ?>
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Qualification</h3>
                        <p><?php echo $sproviders->qualification; ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($sproviders->experience)): ?>
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Experience</h3>
                        <p><?php echo $sproviders->experience; ?></p>
                    </div>
                    <?php endif; ?>


                    <!-- Reviews and Ratings Section -->
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">Reviews & Ratings</h3>
                        <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <p>Rating: <?php echo e($rating->rating); ?> stars</p>
                            <p>Comment: <?php echo e($rating->message); ?></p>
                            <p>By: <?php echo e($rating->name); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="rating-section">
                            <form action="<?php echo e(route('rating.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="input-group-meta position-relative rating mb-3">
                                        <!-- <label for="rating" class="form-label">Your Rating:</label> -->
                                        <input type="radio" class="form-control" name="rating" id="rating-5" value="5">
                                        <label for="rating-5" title="5 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-4" value="4">
                                        <label for="rating-4" title="4 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-3" value="3">
                                        <label for="rating-3" title="3 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-2" value="2">
                                        <label for="rating-2" title="2 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-1" value="1">
                                        <label for="rating-1" title="1 star">★</label>
                                    </div>
                                    <div class="input-group-meta position-relative">
                                        <label for="comment" class="form-label">Your Comment:</label>
                                        <textarea name="message" class="form-control" rows="4" placeholder="Leave a comment"></textarea>

                                    </div>
                                    <input type="text" class="form-control" id="Service_Provider_ID" value="<?php echo e($sproviders->id); ?>" name="Service_Provider_ID" required hidden>
                                    <div class="col-12">
                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Testimonials Section -->
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">User Feedback</h3>
                        <?php if($feedback->isEmpty()): ?>
                        <p>No feedback available.</p>
                        <?php else: ?>
                        <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-inner">
                                <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                    <div class="d-block w-100 p-4">
                                        <p><?php echo e($item->message); ?></p>
                                        <small>Posted on: <?php echo e($item->created_at->format('d M Y')); ?></small>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#FeedbackModal" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Add Your Feedback</a>
                        <div class="modal fade" id="FeedbackModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                <div class="container">
                                    <div class="user-data-form modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        <div class="form-wrapper m-auto">
                                            <form method="POST" action="<?php echo e(route('feedback.store')); ?>" class="mt-10">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">

                                                    <div class="input-group-meta position-relative">
                                                        <input type="text" class="form-control" id="Service_Provider_ID" value="<?php echo e($sproviders->id); ?>" name="Service_Provider_ID" required hidden>
                                                    </div>
                                                    <div class="input-group-meta position-relative">
                                                        <label for="">Message</label>
                                                        <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.form-wrapper -->
                                    </div>
                                    <!-- /.user-data-form -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Section -->
                    <h3 class="title">Portfolio</h3>
                    <div class="candidate-portfolio-slider">
                        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <a href="#" class="w-100 d-blok"><img src="<?php echo e(asset('image/portfolios')); ?>/<?php echo e($portfolio->image); ?>" alt="" style="height: 200px; width: 100%; object-fit: cover;"></a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.candidates-profile -->

<!--
        =====================================================
            Company Open Position
        =====================================================
        -->
<section class="company-open-position pt-8 px-8 lg-pt-6 pb-10 lg-pb-6">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <div class="title-two">
                    <h2>
                        Service Provided
                    </h2>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex justify-content-lg-end">
                    <a href="#" class="btn-six">Explore More</a>
                </div>
            </div>
        </div>
        <div class=" row">
            <?php $__currentLoopData = \App\Models\Service::where('service_provider_id',$sproviders->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-30">
                <div class="job-list-two style-two position-relative">
                    <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="logo"><img src="images/lazy.svg" data-src="<?php echo e(asset('image/services')); ?>/<?php echo e($service->image); ?>" alt="" class="lazy-img m-auto"></a>
                    <a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="save-btn text-center rounded-circle tran3s" title="Save Job"><i class="bi bi-bookmark-dash"></i></a>
                    <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="job-duration fw-500"><?php echo e($service->category->name); ?></a></div>
                    <div><a href="<?php echo e(route('home.service_details',['service_slug'=>$service->slug])); ?>" class="title fw-500 tran3s"><?php echo e($service->name); ?></a></div>
                    <div class="job-salary"><span class="fw-500 text-dark"><?php echo e($service->price); ?></span> / RWF</div>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                        <div class="job-location"><a href="<?php echo e(route('home.service_location',['service_location'=>$service->location])); ?>"><?php echo e($service->location); ?></a></div>
                        <a href="<?php echo e(route('home.booking',['service_slug'=>$service->slug])); ?>" class="apply-btn text-center tran3s">Book Service</a>
                    </div>
                </div> <!-- /.job-list-two -->
            </div>
            <!-- /.job-list-one -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

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
                                    <div class="candidate-post"><?php echo e(Str::limit($promotion->description,50)); ?></div>
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
</section>
<!--
        =====================================================
            Job Portal Intro
        =====================================================
        -->
<?php echo $__env->make('includes.call-to-action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /.job-portal-intro -->

<script>
    const profileUrl = 'http://localhost:8000/profile/<?php echo e($sproviders->id); ?>'; // Replace with your profile URL
    const profileText = 'Check out this profile!'; // Optional text for sharing

    function shareOnFacebook() {
        const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(profileUrl)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }

    function shareOnTwitter() {
        const url = `https://twitter.com/intent/tweet?url=${encodeURIComponent(profileUrl)}&text=${encodeURIComponent(profileText)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }

    function shareOnLinkedIn() {
        const url = `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(profileUrl)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }

    function shareOnWhatsApp() {
        const url = `https://wa.me/?text=${encodeURIComponent(profileText)}%20${encodeURIComponent(profileUrl)}`;
        window.open(url, '_blank', 'width=600,height=400');
    }

    function shareOnInstagram() {
        // Instagram does not support direct sharing via URL, so this is a placeholder
        alert('Direct sharing to Instagram is not supported via URL. Please use the Instagram app.');
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/service_provider/serviceProviderProfile.blade.php ENDPATH**/ ?>