@extends('layouts.base')
@section('title', 'Service Categories')
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
                            <h2 class="text-white">@yield('title')</h2>
                        </div>
                        <p class="text-lg text-white mt-30 lg-mt-20">Read our @yield('title') from top talents</p>
                    </div>
                </div>

            </div>
        </div>
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
    </div>
    <!-- /.inner-banner-one -->

    <!-- 
		=============================================
			Category Section Two
		============================================== 
		-->
    <section class="category-section-three category-section-three-category  pt-85 lg-pb-100">
    <div class="container">
        @foreach($scategories as $scategory)
        <div class="row justify-content-between mt-50">
            <div class="col-md-8 col-sm-8">
                <div class="title-one text-center text-sm-start">
                    <h2 class="fw-300">{{$scategory->name}} categories.</h2>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="d-none d-sm-flex justify-content-sm-end mt-25">
                    <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}" class="btn-six border-0">All Service in
                        {{$scategory->name}}
                        <img src="{{ asset('asset/images/lazy.svg')}}"
                            data-src="{{ asset('asset/images/shape/shape_23.svg')}}" alt="" class="lazy-img shapes">
                    </a>
                </div>
            </div>
        </div>
        <div class="card-wrapper row mt-80 lg-mt-40">
            @if(count($scategory->subcategories) > 0)
            @foreach($scategory->subcategories as $scat)
            <div class="col-lg-2 text-center col-md-2 col-sm-2 d-flex">
                <div class="card-style-four tran3s w-100 mt-30 wow fadeInUp">
                        <div class="title tran3s fw-500 text-lg">
                            <a class="total-job"
                                href="{{ route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug]) }}">
                                {{ $scat->name }}
                            </a>
                        </div>
                </div>
                <!-- /.card-style-four -->
            </div>
            @endforeach
            @endif
        </div>
        <!-- /.card-wrapper -->
         @endforeach
        <div class="text-center d-sm-none mt-50"><a href="{{route('home.service_categories')}}"
                class="btn-six border-0">All Categories <img src="{{ asset('asset/images/lazy.svg')}}"
                    data-src="{{ asset('asset/images/shape/shape_23.svg')}}" alt="" class="lazy-img shapes"></a></div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_24.svg')}}" alt=""
        class="lazy-img shapes shape_01">
</section>
    <!-- ./category-section-two -->
    <div class="Page-navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                {{$scategories->links()}}
            </li>
        </ul>
    </div>


    <!-- 
		=============================================
			Text Feature Three
		============================================== 
		-->
    <section class="text-feature-three position-relative pt-100 lg-pt-75 md-pt-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 order-lg-last ms-auto">
                    <div class="wow fadeInRight ms-xxl-5">
                        <div class="title-one">
                            <div class="sub-title">FIND Services</div>
                            <h2 class="fw-600">Hire top talents</h2>
                        </div>
                        <div class="accordion accordion-style-one mt-40" id="accordionOne">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Seamless Search
                                    </button>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>It only takes 5 minutes. Set-up is smooth and simple, with fully customisable page design to reflect your brand. It only takes 5 minutes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Hire top talents
                                    </button>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
                                    <div class="accordion-body">
                                        <p>Practice what you learned on realistic lorem quis test questions testing.</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.accordion-style-one -->
                        <a href="{{route('home.service_provider')}}" class="btn-five border6 mt-70 lg-mt-40">Explorer All</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="img-box position-relative d-flex align-items-center justify-content-center wow fadeInLeft">
                        <div class=" list-style">
                            @foreach($sproviders as $sprovider)
                            @if(!empty($sprovider->sprovider_name))
                            <div class="candidate-profile-card favourite list-layout border-0 mb-25">
                                <div class="d-flex">
                                    <div class="cadidate-avatar online position-relative d-block me-auto ms-auto">
                                        <a href="{{route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])}}" class="rounded-circle">
                                            <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/profile')}}/{{$sprovider->image}}" alt="" class="lazy-img rounded-circle">
                                        </a>
                                    </div>
                                    <div class="right-side">
                                        <div class="row gx-1">
                                            <div class="col-md-4">
                                                <div class="position-relative mt-10">
                                                    <h4 class="candidate-name mb-0"><a href="{{route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])}}" class="tran3s">{{$sprovider->sprovider_name}}</a></h4>
                                                    <div class="candidate-post">@if($sprovider->service_category_id)
                                                        {{$sprovider->category->name}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="candidate-info mt-10">
                                                    <span>Location</span>
                                                    <div>{{$sprovider->city}}</div>
                                                </div>
                                                <!-- /.candidate-info -->
                                            </div>
                                            <div class=" col-md-3" style="margin: 15px;">
                                                <div class="d-flex justify-content-lg-end">
                                                    <a href="{{route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])}}" class="profile-btn tran3s ms-md-2 mt-10 sm-mt-20">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.candidate-profile-card -->
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- /.big-circle -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.text-feature-three -->

    @include('includes.call-to-action')
</div>

@endsection