@extends('layouts.base')
@section('title', 'Services')
@section('content')
<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
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
                            <h2 class="text-white">@yield('title') </h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20 mb-35 lg-mb-20">We delivered blazing fast & striking work solution</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->
    <!-- 
		=============================================
			Job Listing Three
		============================================== 
		-->
    <section class="job-listing-three pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-area-tab">
                        <div class="light-bg border-20 ps-4 pe-4">
                            <a class="filter-header border-20 d-block collapsed" data-bs-toggle="collapse" href="#collapseFilterHeader" role="button" aria-expanded="false"><span class="main-title fw-500 text-dark">Filter By</span></a>
                            <div class="collapse border-top" id="collapseFilterHeader">
                                <div class="pt-25 pb-30">

                                    <div class="row">
                                        @foreach($scategories as $scateg)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="filter-block d-xl-flex pb-25">
                                                <div class="filter-title fw-500 text-dark mt-1 {{count($scateg->subcategories) > 0 ? 'has-child-cate':''}}">
                                                    <a href="{{route('home.service_by_category',['category_slug'=>$scateg->slug])}}">{{$scateg->name}}</a>
                                                </div>
                                                <div class="main-body ps-xl-4 flex-fill">
                                                    <ul class="style-none filter-input">
                                                        @if(count($scateg->subcategories) > 0)
                                                        @foreach($scateg->subcategories as $scat)
                                                        <li>
                                                            <a href="{{ route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug]) }}">
                                                                {{ $scat->name }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /.filter-block -->
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-2 m-auto">
                                            <a href="#" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-30 md-mt-10">Apply Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.filter header -->
                        </div>
                    </div>
                    <!-- /.filter-area-tab -->
                </div>

                <div class="col-lg-12">
                    <div class="job-post-item-wrapper ms-xxl-5 ms-xl-3">
                        <div class="upper-filter d-flex justify-content-between align-items-center mb-25 mt-70 lg-mt-40">
                            <div class="total-job-found">All jobs found</div>
                            <div class="d-flex align-items-center">
                                <div class="short-filter d-flex align-items-center">
                                    <div class="text-dark fw-500 me-2">Short:</div>
                                    <select name="sortby" id="sortby" class="nice-select form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-box grid-style show">
                            <div class="row">
                                @foreach($services as $service)
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
                        <!-- /.accordion-box -->

                        <div class="Page-navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    {{$services->links()}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.job-post-item-wrapper -->
                </div>
                <!-- /.col- -->
            </div>
        </div>
    </section>
    <!-- ./job-listing-three -->

    @include('includes.call-to-action')
</div>

@endsection