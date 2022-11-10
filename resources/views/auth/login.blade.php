<x-base-layout>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" value="{{ __('Email') }}">Username or email address *</label>
                                    <input type="text" class="form-control" id="email" name="email" required :value="old('email')" required autofocus>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password-2" value="{{ __('Password') }}">Password *</label>
                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember_me">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-link">
                                    {{ __('Forgot your password?') }}
                                    </a>
                                    @endif


                                </div><!-- End .form-footer -->
                            </form>
                            <!-- <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</x-base-layout>