<x-base-layout>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms and conditions</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active">HileTask <h3>Policy</h3></a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">
                            
                            <iframe src="assets/documents/HileTask Privacy Policy.pdf#toolbar=0" width="100%" height="500px">
                                </iframe>
                            <div class="form-footer">
                                
                                <a href="{{ url()->previous() }}" class="btn text-center btn-outline-primary-2">
                                    <i class="icon-long-arrow-left"></i>
                                    <span>Back</span>
                                    
                                </a>
                            </div>
                        </div>
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</x-base-layout>