<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="container">
            <div class="user-data-form modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center">
                    <h2>Hi, Welcome Back!</h2>
                    <p>Still don't have an account? <a href="{{route('register')}}">Sign up</a></p>
                </div>
                <div class="form-wrapper m-auto">
                    <form method="POST" action="{{ route('login') }}" class="mt-10">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group-meta position-relative mb-25">
                                    <label>Email*</label>
                                    <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email" required :value="old('email')" required autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta position-relative mb-20">
                                    <label>Password*</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" required autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
<label for="remember_me">Keep me logged in</label>

                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div> <!-- /.agreement-checkbox -->
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex align-items-center mt-30 mb-10">
                        <div class="line"></div>
                        <span class="pe-3 ps-3">OR</span>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="{{ asset('asset/images/icon/google.png')}}" alt="">
                                <span class="ps-2">Login with Google</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
                                <img src="{{ asset('asset/images/icon/facebook.png')}}" alt="">
                                <span class="ps-2">Login with Facebook</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-center mt-10">Don't have an account? <a href="{{route('register')}}" class="fw-500">Sign up</a></p>
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </div>
</div>