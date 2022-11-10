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
                    <h2 class="text-center">Reset password</h2>
                    <div>
                        <div id="signin-2">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group">
                                    <label for="email" value="{{ __('Email') }}" >Email</label>
                                    <input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                </div>

                                <div class="form-group">
                                    <label for="password" value="{{ __('Password') }}" >Password</label>
                                    <input id="password" class="form-control mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                    <input id="password_confirmation" class="form-control mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</x-base-layout>