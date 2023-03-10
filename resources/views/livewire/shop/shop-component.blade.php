<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>
            @foreach($sproducts as $product)
            <div class="intro-slide" style="background-image: url(assets/images/products/{{$product->image}});">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">{{$product->stock_status}}</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">{{ $product->name }}
                                <span>
                                    <sup class="font-weight-light">from</sup>
                                    <span class="text-primary">{{$product->regular_price}}<span class="text-color-success">RWF</span></span>
                                </span>
                            </h1><!-- End .intro-title -->

                            <a href="{{route('product-detail',['product_slug'=>$product->slug])}}" class="btn btn-outline-primary-2">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-auto offset-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->
            @endforeach
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-4"></div><!-- End .mb-2 -->
    <div class="container">
        <h2 class="title title-border mb-5">Shop by Brands</h2><!-- End .title -->
        <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": true,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            @foreach($products as $product)
            <a href="{{route('product.brand',['brand'=>$product->brand])}}" class="brand">{{$product->brand}}</a>
            @endforeach
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
    <div class="container">
        <h2 class="title text-center mb-2">Explore Popular Categories</h2><!-- End .title -->
        <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" data-owl-options='{"nav": false, "dots": true,"margin": 30,
                        "loop": true,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            @foreach($categories as $category)
            <div class="cat-blocks-container">
                <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cat-block">
                    <figure>
                        <span>
                            <img src="{{asset('assets/images/category/products')}}/{{$category->image}}" alt="{{$category->name}}">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{$category->name}}</h3><!-- End .cat-block-title -->
                </a>
            </div>
            @endforeach
        </div>
    </div><!-- End .container -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Products found
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control" wire:model="sorting">
                                        <option value="default" selected="selected">Default</option>
                                        <option value="date">Newest</option>
                                        <option value="price-desc">high to low</option>
                                        <option value="price">low to high</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-6 col-md-3 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        <span class="product-label label-new">{{$product->stock_status}}</span>
                                        <a href="{{route('product-detail',['product_slug'=>$product->slug])}}">
                                            <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{route('product.brand',['brand'=>$product->brand])}}">{{$product->brand}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product-detail',['product_slug'=>$product->slug])}}">{{ $product->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{$product->regular_price}}<span class="text-color-success">RWF</span>
                                        </div><!-- End .product-price -->
                                        <div class="product-desc">
                                            {{ Str::limit($product->short_description,50)}}
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 12 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <a href="#" class="btn-product btn-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="d-flex">
                        {{$products->Links()}}
                    </div>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>