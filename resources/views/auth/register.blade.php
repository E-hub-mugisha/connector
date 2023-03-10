<x-base-layout>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                            <a class="nav-link">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('register')}}">Register</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div>
                                    <label for="name" value="{{ __('Name') }}">Your Names</label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="email" value="{{ __('Email') }}">Your Email</label>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="phone" value="{{ __('phone') }}">Your phone</label>
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="utype" value="{{ __('Register as') }}">Register as</label>
                                    <select id="registeras" class="form-control @error('registeras') is-valid @enderror" name="registeras" required>
                                        <option value="CST">Customer</option>
                                        <option value="SVP">Service Provider</option>
                                        @error('registeras')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="password" value="{{ __('Password') }}">Your Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="terms" value="1" required />
                                    <label class="form-check-label">
                                        Agree with the <a href="{{ route('terms') }}">
                                            {{ __('Terms and conditions') }}
                                        </a>
                                    </label>

                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Sign Up</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div>
                            </form>

                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</x-base-layout>