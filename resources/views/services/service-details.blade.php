@extends('layouts.base')
@section('title', $service->name)
@section('content')
<!-- =============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="candidate-profile-card list-layout">
            <div class="d-flex align-items-start align-items-xl-center">
                <div class="cadidate-avatar position-relative d-block me-auto ms-auto"><a href="#" class="rounded-circle"><img src="{{asset('image/services')}}/{{$service->image}}" alt="" class="lazy-img rounded-circle"></a></div>
                <div class="right-side">
                    <div class="row gx-1 align-items-center">
                        <div class="col-xl-2 order-xl-0">
                            <div class="position-relative">
                                <h4 class="candidate-name text-white mb-0">{{$service->name}}</h4>
                                <div class="candidate-post">{{$service->category->name}}</div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 order-xl-1">
                            <div class="candidate-info">
                                <span>Location</span>
                                <div>{{$service->location}}</div>
                                <span style="margin: 6px;">Duration:{{ $service->duration}}</span>
                            </div>
                            <!-- /.candidate-info -->
                        </div>
                        <div class="col-xl-2 col-md-4 order-xl-2">
                            <div class="candidate-info">
                                <span style="margin: 6px;">Original Price:{{ $service->price}}</span>
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
                            </div>
                            <!-- /.candidate-info -->
                        </div>
                        <div class="col-xl-3 col-md-4 order-xl-4">
                            <div class="d-flex justify-content-md-end">
                                <a href="#" class="save-btn text-center rounded-circle tran3s"><i class="bi bi-heart"></i></a>
                                <a href="{{route('home.booking',['service_slug'=>$service->slug])}}" class="cv-download-btn fw-500 tran3s ms-md-3 sm-mt-20">Book Now</a>
                            </div>
                        </div>
                    </div>
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
                <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                    <div class="cadidate-bio bg-wrapper bg-color mb-6 md-mb-40">
                        <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}">
                            <img src="{{asset('image/services')}}/{{$service->image}}"
                                alt="image"
                                class="lazy-img m-auto"
                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
                        </a>

                        <h3 class="cadidate-name ">{{$service->name}}</h3>
                        <div class=" pb-25">
                            {{$service->category->name}}
                        </div>
                        <ul class="style-none">
                            <li>
                                <span>Location: </span>
                                <div>{{$service->location}}</div>
                            </li>

                            <span>Social:</span>
                            <div>
                                <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                            </li>
                        </ul>
                        <a href="{{route('home.booking',['service_slug'=>$service->slug])}}" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Book Now</a>
                    </div>
                    <!-- /.cadidate-bio -->
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$service->location}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <h4 class="sidebar-title">Rate {{$service->name}}</h4>
                </div>
                <!-- /.cadidate-profile-sidebar -->
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Overview</h3>
                        <p>{!! $service->description !!}</p>
                    </div>
                    @if($service->media->isNotEmpty())
                    <div class="category-section-three pt-85 pb-140 lg-pb-100">
                        <div class="container">

                            <div class="inner-card border-style mb-65 lg-mb-40">
                                <div class="title-two mb-60 lg-mb-40">
                                    <h2 class="title">Other Services Media</h2>
                                </div>

                                <div class="row">
                                    @foreach($service->media as $media)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card border-0 shadow-sm">
                                            @if($media->type === 'image')
                                            <img src="{{ asset('image/services/' . $media->file_path) }}" class="card-img-top" alt="Service Image">
                                            @elseif($media->type === 'video')
                                            <video class="card-img-top" controls>
                                                <source src="{{ asset('image/services/' . $media->file_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">Service Media</h5>
                                                <a href="{{ asset('image/services/' . $media->file_path) }}" target="_blank" class="btn btn-primary">View</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                    @endif
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">More</h3>
                        <div class="time-line-data position-relative pt-15">
                            <div class="info position-relative">
                                <div class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">1</div>

                                <h4>Inclusion</h4>
                                @foreach(explode("|",$service->inclusion) as $inclusion)
                                <p>{!!$inclusion!!}</p>
                                @endforeach
                            </div>
                            <div class="info position-relative">
                                <div class="numb fw-500 rounded-circle d-flex align-items-center justify-content-center">2</div>

                                <h4>Exclusion</h4>
                                @foreach(explode("|",$service->exclusion) as $exclusion)
                                <p>{!!$exclusion!!}</p>
                                @endforeach
                            </div>
                            <!-- ./info -->
                            <!-- ./info -->
                        </div>
                        <!-- /.time-line-data -->
                    </div>
                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">

                    <!-- /.inner-card -->
                    @if($r_service)
                    <div class="inner-card">
                        <h3 class="title">Related</h3>
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">

                            <div class="job-list-two style-two position-relative">
                            <a href="{{route('home.service_details',['service_slug'=>$r_service->slug])}}">
                                            <img src="{{asset('image/services')}}/{{$r_service->image}}"
                                                alt="image"
                                                class="lazy-img m-auto"
                                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
                                        </a>
                                <span class="save-btn text-center tran3s" title="Save Job">{{ $service->duration}}</span>
                                <div><a href="{{route('home.service_details',['service_slug'=>$r_service->slug])}}" class="job-duration fw-500">{{$r_service->category->name}}</a></div>
                                <div><a href="{{route('home.service_details',['service_slug'=>$r_service->slug])}}" class="title fw-500 tran3s">{{$r_service->name}}</a></div>
                                <div class="job-salary"><span class="fw-500 text-dark">{{$r_service->price}}</span> / RWF</div>
                                <div class="job-location"><a href="{{route('home.service_location',['service_location'=>$r_service->location])}}">{{ $r_service->location}}</a></div>

                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <a href="{{route('home.booking',['service_slug'=>$r_service->slug])}}" class="apply-btn text-center tran3s">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- /.inner-card -->

                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
    </div>
</section>


<section class="job-portal-intro">
    <div class="container">
        <div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
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
                        <li class="ms-2"><a href="{{route('register')}}" class="btn-four">Join the team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.job-portal-intro -->
@endsection