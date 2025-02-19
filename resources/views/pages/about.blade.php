@extends('layouts.base')
@section('title', 'About')
@section('content')
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
                        <h2 class="text-white">About us</h2>
                    </div>
                    <ul class="style-none d-flex justify-content-center page-pagination mt-15">
                        <li><a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg') }}" data-src="{{ asset('asset/images/shape/shape_02.svg') }}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg') }}" data-src="{{ asset('asset/images/shape/shape_03.svg') }}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->

<!-- 
		=============================================
			Text Feature Three
		============================================== 
		-->
<section class="text-feature-three position-relative pt-100 lg-pt-80 md-pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-11 m-auto">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="title-one mt-30 md-mb-40">
                            <h2 class="fw-200" style="font-size:40px;"> Simplifying the path to experts and business growth for service seekers and providers</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="wow fadeInRight">
                            <div class="accordion accordion-style-one color-two ps-xxl-5 ms-xxl-4" id="accordionOne">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Who we are?
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                                We are an online booking system and management tool designed to help service providers to control,
                                                run, grow and manage their business better while customers find & book their favorite services online no matter where they are or when they want to book.
                                                Our goal is to easily connect service providers ready to work, with people who need work done.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What we do
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                                The connector allows service providers to accept online bookings 24×7, attract more new and existing clients,
                                                manage their staff and clients, save time, increase revenue and customer satisfaction, collect feedback from clients, and get analytics and reports for deeply understanding their business performance.
                                                We make service providers more accessible online and easily book suitable times for customers.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            what's the mission
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            To empower service providers through cutting-edge digital solutions that streamline data-driven decision-making, simplify marketing efforts, and ensure customers have seamless access to reliable experts everywhere.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.accordion-style-one -->
                        </div>
                    </div>
                </div>

                <div class="video-post d-flex align-items-center justify-content-center mt-100 lg-mt-50 mb-50 lg-mb-30">
                    <a class="fancybox rounded-circle video-icon tran3s text-center" data-fancybox="" href="#">
                        <i class="bi bi-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.text-feature-three -->

<!-- 
		=============================================
			Text Feature One
		============================================== 
		-->
<section class="text-feature-one position-relative pt-180 xl-pt-150 lg-pt-100 md-pt-80 pb-180 xl-pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order-lg-last">
                <div class="ps-xxl-4 wow fadeInRight">
                    <div class="title-one">
                        <h2>Get over 50.000+ talented experts in connector</h2>
                    </div>
                    <p class="mt-40 md-mt-20 mb-40 md-mb-20">A full hybrid workforce management tools are yours to use, as well as access to our top 1% of talent. </p>
                    <ul class="list-style-one style-none">
                        <li>Seamless Service</li>
                        <li>Get top 3% experts for your Inquiry</li>
                    </ul>
                    <a href="{{ route('home.services') }}" class="btn-one lg mt-50 md-mt-30">Get a service</a>
                </div>
            </div>
            <div class="col-lg-5 col-md-11 m-auto order-lg-first">
                <div class="img-data position-relative pe-xl-5 me-xl-5 md-mt-50">
                    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/assets/image7.jpg')}}" alt="" class="lazy-img img01">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.text-feature-one -->

<section class="text-feature-three position-relative pt-100 lg-pt-80 md-pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-11 m-auto">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-one mt-30 md-mb-40">
                            <h2 class="fw-500">Key Benefits for Connector.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="wow fadeInRight">
                            <div class="title-one mt-30 md-mb-40">
                            <h3 class="fw-500">For Customers.</h3>
                        </div>
                            <div class="accordion accordion-style-one color-two ps-xxl-5 ms-xxl-4" id="accordionOne">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Easy Access to reliable experts
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Quickly finds and connects with vetted, trustworthy expert service providers that match your specific needs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Wide range of Services
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                                Explore diverse services, compare multiple providers and choose the best fit for your needs and preference. 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Convenient and time-saving
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Book your favorite services online from anywhere, eliminating traditional search methods
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Transparency
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Access clear information about providers expertise, pricing, and availability.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Data-Driven Decision Making
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Utilize ratings, reviews and data insights to make informed choices.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            24/7 Availability
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Book services at any time, offering flexibility beyond business hours.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Exclusive Deals
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Access special deals and discounts from service providers
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Free Access
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Find and book affordable best service for free charges, no commission needed
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.accordion-style-one -->
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="wow fadeInRight">
                            <div class="title-one mt-30 md-mb-40">
                            <h3 class="fw-500">For Service Providers.</h3>
                        </div>
                            <div class="accordion accordion-style-one color-two ps-xxl-5 ms-xxl-4" id="accordionOne">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Access to Opportunities
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Connect with Job opportunities tailored to your expertise.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Increased Visibility and reach
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                               Showcase your skills, qualifications, and services to a wider audience to attract more new customers.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Easy Booking Process
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Allow clients to find and book your services online, enhancing convenience.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Efficient Workflow
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Streamline operations with a user-friendly interface and digital tools.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Simplified booking and management
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Easy-to-use platform for managing appointments, schedules, and managing customers information and relationships effectively.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Data-Driven Insights
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Gain valuable insights into your business performance with our comprehensive data and analytics. Optimize your strategies, improve your services, and make informed business decisions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Feedback and Reviews
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                            Use reviews to enhance reputation and attract more clients.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Free Trial Period
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                                           Get a free trial period or free account for exploring and enjoying connector services before making a decision
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Direct Connection with Customer
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                               Enable service providers to deal directly with customers, eliminating intermediaries for better control over services.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            No Commission Fees
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <p>
                               Allow service providers to keep 100% of their earnings with no commission fees charged by the platform
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.accordion-style-one -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
		=====================================================
			How It Works
		=====================================================
		-->
<section class="how-it-works position-relative bg-dark pt-110 lg-pt-80 pb-110 lg-pb-70">
    <div class="container">
        <div class="title-one text-center mb-65 lg-mb-40">
            <h2 class="text-white">How it’s <span class="position-relative">work? <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_07.svg')}}" alt="" class="lazy-img shapes shape"></span></h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="card-style-two text-center mt-25 wow fadeInUp">
                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_08.svg')}}" alt="" class="lazy-img"></div>
                    <div class="title fw-500 text-white">Create Account</div>
                    <p>It’s very easy to open an account and start your journey.</p>
                </div>
                <!-- /.card-style-two -->
            </div>
            <div class="col-xxl-3 col-lg-4 col-md-6 m-auto">
                <div class="card-style-two text-center position-relative arrow mt-25 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_09.svg')}}" alt="" class="lazy-img"></div>
                    <div class="title fw-500 text-white">Complete your profile</div>
                    <p>Complete your profile with all the info to get attention of client.</p>
                </div>
                <!-- /.card-style-two -->
            </div>
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="card-style-two text-center mt-25 wow fadeInUp" data-wow-delay="0.19s">
                    <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="images/icon/icon_10.svg" alt="" class="lazy-img"></div>
                    <div class="title fw-500 text-white">Apply service or hire</div>
                    <p>Apply & get your preferable services with all the requirements and get it.</p>
                </div>
                <!-- /.card-style-two -->
            </div>
        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_08.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_09.svg')}}" alt="" class="lazy-img shapes shape_02">
</section>
<!-- /.how-it-works -->

<!--
		=====================================================
			FeedBack Section One
		=====================================================
		-->
<section class="feedback-section-one pt-45 xl-pt-45 lg-pt-50 pb-40 lg-pb-10">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="title-one text-center text-md-start mb-65 md-mb-50">
                    <h2>Here From our clients</h2>
                </div>
            </div>
        </div>

        <div class="row feedback-slider-one">
            @foreach( $feedbacks as $feedback )
            <div class="item">
                <div class="feedback-block-one">
                    <!-- <div class="logo">
                        <img src="{{ asset('asset/images/logo/media_01.png')}}" alt="">
                    </div> -->
                    <blockquote class="fw-500 mt-30 md-mt-30 mb-30 md-mb-30">“{{ $feedback->message}}.”</blockquote>
                    <div class="name text-dark"><span class="fw-500">{{ $feedback->name}}</span></div>
                    <!-- <div class="review pt-40 md-pt-20 mt-40 md-mt-30 d-flex justify-content-between align-items-center">
                        <div class="text-md fw-500 text-dark">4.5 Excellent</div>
                        <ul class="style-none d-flex">
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                            <li><a href="#"><i class="bi bi-star"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- /.feedback-block-one -->
            </div>
            @endforeach
        </div>
        <ul class="slider-arrows slick-arrow-one d-flex justify-content-center style-none sm-mt-30">
            <li class="prev_b slick-arrow"><i class="bi bi-arrow-left"></i></li>
            <li class="next_b slick-arrow"><i class="bi bi-arrow-right"></i></li>
        </ul>
    </div>
</section>


@include('includes.brands')
<!-- /.partner-logos -->
<!-- /.feedback-section-one -->

<!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
<section class="job-portal-intro">
    <div class="container">
        <div class="wrapper bottom-border top-border pt-65 md-pt-50 pb-65 md-pb-50">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="text-center text-lg-start">
                        <h2>Most complete service portal.</h2>
                        <p class="text-md m0 md-pb-20">Signup and start find your service or talents.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
                        <li class="me-2"><a href="{{ route('home.services') }}" class="btn-three">Looking for Service?</a></li>
                        <li class="ms-2"><a href="{{route('register')}}" class="btn-four">Post a job</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.job-portal-intro -->
@endsection