<div class="container">
    <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->

    <div class="cat-blocks-container">
        <div class="row">
            @foreach($scategories as $scategory)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}" class="cat-block">
                    <figure>
                        <span>
                            <img src="{{ asset('assets/images/category') }}/{{$scategory->image}}" alt="{{$scategory->name}}">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{$scategory->name}}</h3><!-- End .cat-block-title -->
                </a>
            </div><!-- End .col-sm-4 col-lg-2 -->
            @endforeach
        </div><!-- End .row -->
        <div class="more-container text-center mt-1 mb-5">
            <a href="{{route('home.service_categories')}}" class="btn btn-outline-dark-2 btn-round btn-more"><span>View all</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->
<div class="container">
    <div class="heading text-center mb-3">
        <h2 class="title">Today’s</h2><!-- End .title -->
        <p class="title-desc">Featured categories</p><!-- End .title-desc -->
    </div><!-- End .heading -->
    <div class="cat-blocks-container">
        <div class="row">
            @foreach($fscategories as $scategory)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}" class="cat-block">
                    <figure>
                        <span>
                            <img src="{{ asset('assets/images/category') }}/{{$scategory->image}}" alt="{{$scategory->name}}">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{$scategory->name}}</h3><!-- End .cat-block-title -->
                </a>
            </div><!-- End .col-sm-4 col-lg-2 -->
            @endforeach
        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->