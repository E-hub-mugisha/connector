@extends('layouts.base')
@section('title', 'Profile')
@section('content')

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
                        <h2 class="text-white">{{$sproviders->sprovider_name}}</h2>
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
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
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
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/profile')}}/{{$sproviders->image}}" alt="" class="lazy-img rounded-circle w-100">
                            </div>
                        </div>
                        <h3 class="cadidate-name text-center">{{$sproviders->sprovider_name}}</h3>
                        <div class="text-center pb-25">
                            @if($sproviders->service_category_id)
                            {{$sproviders->category->name}}
                            @endif
                        </div>
                        <ul class="style-none">
                            <li>
                                <span>Phone: </span>
                                <div><a href="tel:{{$sproviders->user->phone}}">{{$sproviders->user->phone}}</a></div>
                            </li>
                            <li><span>Location: </span>
                                <div>{{$sproviders->city}} </div>
                            </li>
                            <li><span>Total Served: </span>
                                <div>@php $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sproviders->id)->where('status','completed')->count(); @endphp</div><span>{{$totalSales}}</span>
                            </li>
                            <li><span>Email: </span>
                                <div><a href="mailto:{{$sproviders->proEmail}}">{{$sproviders->proEmail}}</a></div>
                            </li>
                            <li>
                                <span>Overall Rating: </span>
                                <div>
                                    <span class="average-rating">
                                        {{ $averageRating }}/5
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=floor($averageRating))
                                            ★
                                            @elseif ($i==ceil($averageRating) && $averageRating - floor($averageRating)> 0)
                                            <span style="color: #FFD700;">&#9733;</span> <!-- Half star in gold -->
                                            @else
                                            <span style="color: #ddd;">★</span> <!-- Unfilled star -->
                                            @endif
                                            @endfor
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
                            @foreach($workingHours as $workingHour)
                            <li>
                                <span>{{ \Carbon\Carbon::parse($workingHour->day)->format('l') }}:</span>
                                @if($workingHour->is_closed)
                                Closed
                                @else
                                {{ \Carbon\Carbon::parse($workingHour->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($workingHour->end_time)->format('h:i A') }}
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <!-- Location Section -->
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$sproviders->city}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <!-- Email Form -->
                    <h4 class="sidebar-title">Email {{$sproviders->sprovider_name}}.</h4>
                    <div class="email-form bg-wrapper bg-color" id="sendEmail">
                        <p>Your email address & profile will be shown to the recipient.</p>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="/sendEmailInquiry" method="POST">
                            @csrf
                            <div class="d-sm-flex mb-25">
                                <label for="">Name</label>
                                <input type="text" placeholder="Your Name*" name="name" id="name" required="required">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email *" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <input type="text" class="form-control" id="proEmail" value="{{$sproviders->proEmail}}" name="proEmail" placeholder="Email *" required hidden>
                                @error('proEmail')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                                @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25 xs-mb-10">
                                <label for="">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                        <p>{!!$sproviders->about!!}</p>
                    </div>

                    @if(!empty($sproviders->skills))
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Skills</h3>
                        <p>{!! $sproviders->skills !!}</p>
                    </div>
                    @endif

                    @if(!empty($sproviders->qualification))
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Qualification</h3>
                        <p>{!! $sproviders->qualification !!}</p>
                    </div>
                    @endif

                    @if(!empty($sproviders->experience))
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Experience</h3>
                        <p>{!! $sproviders->experience !!}</p>
                    </div>
                    @endif


                    <!-- Reviews and Ratings Section -->
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">Reviews & Ratings</h3>
                        @foreach($ratings as $rating)
                        <div>
                            <p>Rating: {{ $rating->rating }} stars</p>
                            <p>Comment: {{ $rating->message }}</p>
                            <p>By: {{ $rating->name }}</p>
                        </div>
                        @endforeach
                        <div class="rating-section">
                            <form action="{{ route('rating.store') }}" method="POST">
                                @csrf
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
                                    <input type="text" class="form-control" id="Service_Provider_ID" value="{{$sproviders->id}}" name="Service_Provider_ID" required hidden>
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
                        @if ($feedback->isEmpty())
                        <p>No feedback available.</p>
                        @else
                        <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-inner">
                                @foreach ($feedback as $index => $item)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="d-block w-100 p-4">
                                        <p>{{ $item->message }}</p>
                                        <small>Posted on: {{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                                @endforeach
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
                        @endif
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#FeedbackModal" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Add Your Feedback</a>
                        <div class="modal fade" id="FeedbackModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                <div class="container">
                                    <div class="user-data-form modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        <div class="form-wrapper m-auto">
                                            <form method="POST" action="{{ route('feedback.store')}}" class="mt-10">
                                                @csrf
                                                <div class="row">

                                                    <div class="input-group-meta position-relative">
                                                        <input type="text" class="form-control" id="Service_Provider_ID" value="{{$sproviders->id}}" name="Service_Provider_ID" required hidden>
                                                    </div>
                                                    <div class="input-group-meta position-relative">
                                                        <label for="">Message</label>
                                                        <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                                        @error('message')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
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
                        @foreach($portfolios as $portfolio)
                        <div class="item">
                            <a href="#" class="w-100 d-blok"><img src="{{ asset('image/portfolios') }}/{{$portfolio->image}}" alt="" style="height: 200px; width: 100%; object-fit: cover;"></a>
                        </div>
                        @endforeach
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
            @foreach(\App\Models\Service::where('service_provider_id',$sproviders->id)->get() as $service)
            <div class="col-sm-12 col-md-6 col-lg-4  mb-30">

                <div class="job-list-two style-two position-relative">
                    <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}">
                        <img src="{{asset('image/services')}}/{{$service->image}}"
                            alt="image"
                            class="lazy-img m-auto"
                            style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
                    </a>
                    <span class="save-btn text-center tran3s" title="Save Job">{{ $service->duration}}</span>
                    <div><a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="job-duration fw-500">{{$service->category->name}}</a></div>
                    <div><a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="title fw-500 tran3s">{{$service->name}}</a></div>
                    <div class="job-salary">Original Price:<span class="fw-500 text-dark" style="margin: 6px; color:#ff1e00;">{{$service->price}}</span> / RWF</div>
                    <div>
                        @php
                        $total = $service->price;
                        @endphp
                        @if($service->discount)
                        @if($service->discount_type == 'fixed')
                        <div class="discount-fix">
                            Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}</span>
                        </div>
                        <div class="discount-fix-total">
                            <span>@php $total = $total-$service->discount; @endphp</span>
                        </div>
                        @elseif($service->discount_type == 'percent')
                        <div class="discount-per">
                            Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}%</span>
                        </div>
                        <div class="discount-per-total" style="margin:6px;">
                            <span>@php $total = $total-($total*$service->discount/100); @endphp</span>
                        </div>
                        @endif
                        @endif
                        <div class="total">
                            Total Price:<span style="margin: 6px;">{{$total}}</span>
                        </div>
                    </div>
                    <div class="job-location"><span>Location:</span><a href="{{route('home.service_location',['service_location'=>$service->location])}}">{{ $service->location}}</a></div>

                    <div class="d-flex align-items-center justify-content-between mt-auto">
                        <a href="{{route('home.booking',['service_slug'=>$service->slug])}}" class="apply-btn text-center tran3s">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach
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
                            @foreach( $promotions as $promotion)
                            @if(\Carbon\Carbon::now()->lessThanOrEqualTo($promotion->end_date))

                            <div class="col-xxl-3 col-sm-6 d-flex">
                                <div class="candidate-profile-card favourite text-center grid-layout mb-25">
                                    <a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="save-btn badge-danger tran3s"><span class="bg-danger" style="padding: 5px; border-radius: 10px; color: white;">{{ $promotion->discount}} % </span></a>
                                    <div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="rounded-circle"><img src="images/lazy.svg" data-src="{{asset('image/services')}}/{{$promotion->service->image}}" alt="" class="lazy-img rounded-circle"></a></div>
                                    <h4 class="candidate-name mt-15 mb-0"><a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="tran3s">{{ $promotion->title }}</a></h4>
                                    <div class="candidate-post">{{ Str::limit($promotion->description,50) }}</div>
                                    <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
                                        <li>{{ $promotion->category->name}}</li>
                                        <li class="more">{{ $promotion->service->duration }}</li>
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                    <div class="row gx-1">
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>Price</span>
                                                <div>{{$promotion->service->price}} / RWF</div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>From:&nbsp;{{ $promotion->start_date }}</span>
                                                <div>End date:&nbsp;<span class="text-danger">{{ $promotion->end_date }}</span></div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                    </div>
                                    <div class="row gx-2 pt-25 sm-pt-10">
                                        <div class="col-md-6">
                                            <a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="profile-btn tran3s w-100 mt-5">View Service</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('home.booking',['service_slug'=>$promotion->service->slug])}}" class="msg-btn tran3s w-100 mt-5">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.candidate-profile-card -->
                            </div>
                            @endif
                            @endforeach
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
@include('includes.call-to-action')
<!-- /.job-portal-intro -->

<script>
    const profileUrl = 'http://localhost:8000/profile/{{$sproviders->id}}'; // Replace with your profile URL
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
@endsection