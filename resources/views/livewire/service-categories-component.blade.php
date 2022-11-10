<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Service Categories</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Service Categories</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($scategories as $scategory)
                            <div class="col-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}">
                                            <img src="{{asset('assets/images/category')}}/{{$scategory->image}}" alt="{{$scategory->name}}" class="product-image" style="height: 198px;">
                                        </a>

                                        <div class="product-action">
                                            <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}" class="btn-product btn-cart"><span>More Service</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}">Service</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}">{{$scategory->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">

                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <span class="ratings-text"></span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                {{$scategories->links()}}
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>