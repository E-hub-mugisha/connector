<!-- 
		=============================================
			Category Section Three
		============================================== 
		-->
        <section class="category-section-three pt-25 pb-40 lg-pb-500">
    <div class="container">
        <div class="position-relative">
            <div class="title-two mb-60 lg-mb-40">
                <h2 class="fw-600 color-blue">Trending Portfolio</h2>
            </div>
            <div class="card-wrapper category-slider-one row">
                @foreach($portfolios as $portfolio)
                <div class="item">
                    <div class="card-style-six position-relative" style="background-image: url({{$portfolio->image}});">
                        <a href="#" class="w-100 h-100 ps-4 pb-20 d-flex align-items-end">
                            <div class="title text-white fw-500 text-lg">{{ Str::limit($portfolio->tag, 50)}}</div>
                        </a>
                    </div>
                    <!-- /.card-style-six -->
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