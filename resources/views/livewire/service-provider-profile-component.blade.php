@section('title', 'Profile')

<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$sproviders->sprovider_name}}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="card shadow product-details-top mt-2 mb-2">
            <div class="row">
                <div class="col-md-4" style="padding:2rem;">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                @if($sproviders->image)
                                <img src="{{asset('assets/images/sproviders')}}/{{$sproviders->image}}" alt="{{$sproviders->user->name}}">
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$sproviders->user->name}}">
                                @endif
                            </figure><!-- End .product-main-image -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-8" style="padding:2rem;">
                    <div class="product-details product-details-centered">
                        <h1 >{{$sproviders->sprovider_name}}</h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <span>Category:</span>&nbsp;
                            <span>
                                @if($sproviders->service_category_id)
                                {{$sproviders->category->name}}
                                @endif
                            </span>
                        </div><!-- End .rating-container -->

                        <div class="product-price">
                            {{$sproviders->city}}
                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p>{{$sproviders->about}}</p>
                        </div><!-- End .product-content -->

                        <div class="product-details-action">
                            <div class="details-action-col">
                                <span>Total served:</span>
                                @php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sproviders->id)->where('status','completed')->count();
                                @endphp
                                <span>{{$totalSales}}</span>
                            </div><!-- End .details-action-col -->
                        </div><!-- End .product-details-action -->

                        <div class="product-details-footer">
                            <div class="social-icons social-icons-sm">
                                <div class="ss-box"></div>
                                <!-- <span class="social-label">Share:</span> -->
                                <!-- <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a> -->
                                <!-- <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a> -->
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
                <div class="col-md-12">
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <p>{{$sproviders->about}}</p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                @livewire('s-provider-rating', ['sproviders' => $sproviders], key($sproviders->id))
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                </div>
            </div><!-- End .row -->
            <h2 class="title text-center mb-4">Service Provided</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                @foreach(\App\Models\Service::where('service_provider_id',$sproviders->id)->get() as $service)

                <div class="product product-2">
                    <figure class="product-media">
                        <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}">
                            <img src="{{ asset('assets/images/products/thumbnails') }}/{{$service->thumbnail}}" alt="{{$service->name}}" class="product-image" style="width:230px; height:150px;">
                        </a>

                        <div class="product-action">
                            <a href="{{route('home.booking',['service_slug'=>$service->slug])}}" class="btn-product btn-cart" title="Add to cart">Book Now</a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">

                        <h3 class="product-title"><a href="{{route('home.service_details',['service_slug'=>$service->slug])}}">{{$service->name}}</a></h3><!-- End .product-title -->
                        <div class="product-cat">
                            <a href="#">{{$service->category->name}}</a>&nbsp;<span>|</span>&nbsp;<a href="#">{{$service->tagline}}</a>
                        </div><!-- End .product-cat -->
                        <div class="product-price">
                            {{$service->price}}<span>RWF</span>
                        </div><!-- End .product-price -->
                        <!-- <div class="product-desc">
                                            {{ Str::limit($service->description,50)}}
                                        </div> -->
                        <div class="ratings-container">

                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->
                        <div class="product-detail" style="padding:10px;">
                            <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="btn btn-primary btn-round"><span>Read more </span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .product-action -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- End .product-details-top -->




    </div><!-- End .container -->
</div><!-- End .page-content -->