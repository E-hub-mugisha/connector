@extends('layouts.base')
@section('title', 'Reset Password')
@section('content')
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
                        <p class="text-lg text-white mt-30 lg-mt-20">Create an account & Start posting or hiring talents</p>
                    </div>
                </div>

            </div>
        </div>
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
        <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
    </div> <!-- /.inner-banner-one -->



    <!-- 
		=============================================
			Registration Section
		============================================== 
		-->
    <section class="registration-section position-relative pt-100 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            <div class="user-data-form">
                <div class="text-center">
                    <h2>Create Account</h2>
                </div>
                <div class="form-wrapper m-auto">
                    <div class="tab-content mt-40">
                        <div class="tab-pane fade show active" role="tabpanel" id="fc1">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-25">
                                            <label>Email*</label>
                                            <input id="email" class=" mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-20">
                                            <label for="password" value="{{ __('Password') }}">Your Password</label>
                                            <input type="password" id="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta position-relative mb-20">
                                            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">{{ __('Reset Password') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>
                <!-- /.form-wrapper -->
            </div>
            <!-- /.user-data-form -->
        </div>
    </section>

@endsection