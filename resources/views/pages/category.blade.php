<div class="category-menu d-none d-lg-block">
    <ul class="style-none nav-item d-flex align-items-center justify-content-between">
        @foreach( $subcategories as $scat)
        <li><a href="{{ route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug]) }}">{{ $scat->name }}</a></li>
        @endforeach
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">More</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                @foreach( $subcategories as $scat)
                <li><a class="dropdown-item" href="{{ route('home.service_by_subcategory', ['subcategory_slug' => $scat->slug]) }}">{{ $scat->name }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
<section class="category-section-three category-section-three-category  pt-85 lg-pb-100">
    <div class="container">
        <div class="position-relative">
            <div class="row justify-content-between">
                <div class="col-md-6 col-sm-8">
                    <div class="title-one text-center text-sm-start">
                        <h2 class="fw-600">Most demanding job categories.</h2>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                    <div class="d-none d-sm-flex justify-content-sm-end mt-50">
                        <a href="{{route('home.service_categories')}}" class="btn-six border-0">All Categories <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_23.svg')}}" alt="" class="lazy-img shapes"></a>
                    </div>
                </div>
            </div>
            <div class="card-wrapper justify-content-between mt-2 category-slider-one row">
                @foreach($scategories as $scategory)
                <div class="item">
                    <div class="card-style-four justify-items-center tran3s w-100 wow fadeInUp">
                        <a href="{{route('home.service_by_category',['category_slug'=>$scategory->slug])}}" class="d-block">
                            <div class="icon tran3s d-flex align-items-center justify-content-center">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('image/categories') }}/{{$scategory->image}}" alt="{{$scategory->name}}" class="lazy-img">
                            </div>
                            <div class="title tran3s fw-400 ">{{$scategory->name}}</div>
                            

                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- /.card-wrapper -->
            <ul class="slider-arrows slick-arrow-two d-flex justify-content-center style-none sm-mt-20">
                <li class="prev_d slick-arrow"><i class="bi bi-chevron-left"></i></li>
                <li class="next_d slick-arrow"><i class="bi bi-chevron-right"></i></li>
            </ul>
        </div>
    </div>
</section>
<!-- ./category-section-three -->