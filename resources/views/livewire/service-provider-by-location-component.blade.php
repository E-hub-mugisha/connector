@section('title', 'Providers by location')

<div>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Services<span>Providers</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services Providers</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="toolbox">

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="container new-arrivals">
                        <div class="heading heading-flex mb-3">
                            <div class="heading-left">
                                <h2 class="title">Service Providers For You</h2><!-- End .title -->
                            </div><!-- End .heading-left -->
                        </div><!-- End .heading -->

                        <div class="tab-content tab-content-carousel just-action-icons-sm">
                            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": true,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                                    @foreach($sproviders as $sprovider)
                                    @if(!empty($sprovider->sprovider_name))
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="{{route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])}}">
                                                @if($sprovider->image)
                                                <img src="{{asset('assets/images/sproviders')}}/{{$sprovider->image}}" alt="{{$sprovider->sprovider_name}}" height="100">
                                                @else
                                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$sprovider->sprovider_name}}" height="100">
                                                @endif
                                            </a>
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">

                                            <h3 class="product-title">
                                                <a href="{{route('home.service-provider_profile',['sprovider_id'=>$sprovider->id])}}">{{$sprovider->sprovider_name}}</a>
                                            </h3><!-- End .product-title -->
                                            <div class="product-cat">
                                                <span>Provides:</span><a href="#">@if($sprovider->service_category_id)
                                                    {{$sprovider->category->name}}
                                                    @endif</a>Services <br />
                                                <div class="mb-1"></div>
                                                <div class="product-price">
                                                    <span class="icon-map-marker"></span>&nbsp; {{$sprovider->city}}
                                                </div>
                                            </div><!-- End .product-cat -->
                                            <div class="product-desc">
                                                {{ Str::limit($sprovider->about,50)}}
                                            </div>
                                            <div class="ratings-container">

                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                            <!-- <div class="product-desc">
                                @php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->distinct('user_id')->count();
                                @endphp
                                <a href="#">Royal Customers: &nbsp;{{$totalSales}}</a><br />
                                <a href="#">2 Comments</a><br />
                                @php
                                $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->count();
                                @endphp
                                <a href="#">Total Served customers: &nbsp;{{$totalSales}}</a>
                            </div> -->
                                        </div><!-- End .product-body -->

                                    </div><!-- End .product -->
                                    @endif
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .container -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">

                            <li class="page-item "><a class="page-link" href="#">
                                    {{$sproviders->links()}}
                                </a></li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-2 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <!-- <a href="#" class="sidebar-filter-clear">Clean All</a> -->
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach(\App\Models\ServiceProvider::all() as $sprovider)
                                        @if(!empty($sprovider->sprovider_name))
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])}}" class="custom-control-label" for="cat-1">
                                                    @if($sprovider->service_category_id)
                                                    {{$sprovider->category->name}}
                                                    @endif </a>
                                            </div><!-- End .custom-checkbox -->
                                            <!-- <span class="item-count">3</span> -->
                                        </div><!-- End .filter-item -->
                                        @endif
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Locations
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach(\App\Models\ServiceProvider::all() as $sprovider)
                                        @if(!empty($sprovider->sprovider_name))
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="{{route('home.service_provider_location',['slocation'=>$sprovider->service_locations])}}" class="custom-control-label" for="cat-1">
                                                    {{$sprovider->service_locations}} </a>
                                            </div><!-- End .custom-checkbox -->
                                            <!-- <span class="item-count">3</span> -->
                                        </div><!-- End .filter-item -->
                                        @endif
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>
