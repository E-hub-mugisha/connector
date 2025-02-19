<!-- 
		=============================================
			Hero Banner
		============================================== 
		-->
<div class="hero-banner-six position-relative pt-170 lg-pt-150 pb-60 lg-pb-40">
    <div class="container">
        <div id="banner-six-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $index => $slider)
                <li data-bs-target="#banner-six-carousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner w-100 h-100">
                @foreach($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('image/slider')}}/{{$slider->image}}" class="d-block w-100" alt="Slide {{$index + 1}}" style="width: 100%;height: 100%;/* object-fit: cover; */ /* max-height: 600px; */">
                    <div class="carousel-caption d-md-block">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-9 col-lg-8 m-auto text-center">
                                <h1>{{$slider->title}}</h1>
                                 <p class="text-md text-white mt-25 mb-55 lg-mb-40">Discover Your Path to Prosperity – Connect with Trusted Experts Today!</p> 
                            </div>
                        </div>
                        <div class="row">
							<div class="col-xl-8 m-auto">
								<div class="row">
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter">{{$totalSales}}</span>+</div>
											<p class="text-white">Total Sales</p>
										</div> <!-- /.counter-block-two -->
									</div>
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter">{{$totalSprovider}}</span>+</div>
											<p class="text-white">Total Service Providers</p>
										</div> <!-- /.counter-block-two -->
									</div>
									<div class="col-sm-4">
										<div class="counter-block-two mt-15 text-center wow fadeInUp" data-wow-delay="0.35s" style="visibility: visible; animation-delay: 0.35s; animation-name: fadeInUp;">
											<div class="main-count fw-500 text-white"><span class="counter">{{$totalDone}}</span>+</div>
											<p class="text-white">Total service Done</p>
										</div> <!-- /.counter-block-two -->
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner-six-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner-six-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


<!-- /.hero-banner-six -->