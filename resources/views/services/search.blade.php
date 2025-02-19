@extends('layouts.base')

@section('title', 'Search Services')

@section('content')
<div>
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
                            <h2 class="text-white">Search Results</h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">We delivered blazing fast & striking work solution</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->

    <div class="container mt-5">
        <h2>Search Services</h2>

        <!-- Search form -->
        <form action="{{ route('services.search') }}" method="GET">
            <div class="row mb-4">
                <!-- Search by service name -->
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Search by service name" value="{{ request('name') }}">
                </div>

                <!-- Filter by category -->
                <div class="col-md-3">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter by subcategory -->
                <div class="col-md-3">
                    <select name="subcategory_id" class="form-control">
                        <option value="">Select Subcategory</option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ request('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="location" class="form-control">
                        <option value="">Select location</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->location }}" {{ request('location') == $location->location ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Search button -->
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Display search results -->
        @if(isset($services) && $services->count() > 0)
        <h3 class="mt-4">Search Results</h3>
        <div class="row">
            @foreach($services as $service)
            <div class="accordion-box grid-style show">
                            <div class="row">
                                @foreach($services as $service)
                                <div class="col-sm-3  mb-30">

                                    <div class="job-list-two style-two position-relative">
                                        <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="logo"><img src="images/lazy.svg" data-src="{{asset('image/services')}}/{{$service->image}}" alt="image" class="lazy-img m-auto"></a>
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
            @endforeach
        </div>
        @elseif(isset($services))
        <p>No services found.</p>
        @endif
    </div>
     <!--
		=====================================================
			Job Portal Intro
		=====================================================
		-->
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
                            <li class="me-2"><a href="{{ route('home.services') }}" class="btn-three">Looking for service?</a></li>
                            <li class="ms-2"><a href="{{route('register')}}" class="btn-four">Join the team</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.job-portal-intro -->
</div>
@endsection