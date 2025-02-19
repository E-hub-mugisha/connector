@section('title', 'Contact')

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
                    <p class="text-lg text-white mt-30 lg-mt-20">Our dedicated support team is ready to assist you with any inquiries or issues you may have. We're committed to ensuring your satisfaction.</p>
                </div>
            </div>

        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<!-- 
		=============================================
			Contact Us
		============================================== 
		-->
<section class="contact-us-section pt-100 lg-pt-80">
    <div class="container">
        <div class="border-bottom pb-150 lg-pb-80">
            <div class="title-one text-center mb-70 lg-mb-40">
                <h2>Get in touch</h2>
            </div>
            <div class="row">
                <div class="col-xl-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="address-block-one text-center mb-40 wow fadeInUp">
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="{{ asset('asset/images/icon/icon_57.svg')}}" alt=""></div>
                                <h5 class="title">Our Address</h5>
                                <p>Kigali <br>Rwanda</p>
                            </div> <!-- /.address-block-one -->
                        </div>
                        <div class="col-md-4">
                            <div class="address-block-one text-center mb-40 wow fadeInUp">
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="{{ asset('asset/images/icon/icon_58.svg')}}" alt=""></div>
                                <h5 class="title">Contact Info</h5>
                                <p>Give us call at <br><a href="tel:+250789919005" class="call">+250 789 919 005</a></p>
                            </div> <!-- /.address-block-one -->
                        </div>
                        <div class="col-md-4">
                            <div class="address-block-one text-center mb-40 wow fadeInUp">
                                <div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="{{ asset('asset/images/icon/icon_59.svg')}}" alt=""></div>
                                <h5 class="title">Inquiry Support</h5>
                                <p>chat service <br><a href="#" class="webaddress">info.connector.rw</a></p>
                            </div> <!-- /.address-block-one -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 m-auto">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="form-style-one mt-85 lg-mt-50 wow fadeInUp">
                        <form action="/sendMessage" method="POST" id="contact-form">
                            @csrf
                            <div class="row controls">
                                <div class="col-sm-6">
                                    <div class="input-group-meta form-group mb-30">
                                        <label for="">Name*</label>
                                        <input type="text" placeholder="Your Name*" id="name" name="name" required="required">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group-meta form-group mb-30">
                                        <label for="">Email*</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email *" required>
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta form-group mb-35">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta form-group mb-35">
                                        <label for="">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                                        @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group-meta form-group mb-35">
                                        <textarea class="form-control" cols="30" rows="4" id="message" name="message" required placeholder="Message *"></textarea>
                                        @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn-eleven fw-500 tran3s ">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.form-style-one -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./contact-us-section -->
<div class="map-banner">
    <div class="gmap_canvas h-100 w-100">
        <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=kigali&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>
</div>