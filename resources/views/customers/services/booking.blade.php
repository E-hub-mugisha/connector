@extends('layouts.guest')
@section('title', 'Booking')
@section('content')


<div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{ route('serviceBooking') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">

                            <div class="col-lg-5 col-md-5">
                                <div class="pricing-card-one border-0 mt-5">
                                    <div class="pack-name" hidden>HTSRV{{$service->id}}</div>
                                    <div class="price ">{{$service->name}}</div>
                                    <ul class="style-none">
                                        <li>{{$service->category->name}}</li>
                                    </ul>
                                    <div style="font-size: 24px; font-weight:700;">
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;"> Service Provider Name: <span class="text-muted mb-2">{{$service->provider->sprovider_name}}</span></p>
                                        <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Provider Email: <span class="text-muted mb-2">{{$service->provider->proEmail}}</span></p>
                                    </div>
                                    <input hidden type="text" class="form-control" id="service_id" name="service_id" value="{{$service->id}}" required>
                                    <input hidden type="text" class="form-control" id="service_provider_id" name="service_provider_id" value="{{$service->service_provider_id}}" required>
                                    <input hidden type="text" class="form-control" id="service_name" name="service_name" value="{{$service->name}}" required>
                                    <input hidden type="text" class="form-control" id="service_provider" name="service_provider" value="{{$service->provider->sprovider_name}}" required>
                                    <input hidden type="text" class="form-control" id="proEmail" name="proEmail" value="{{$service->provider->proEmail}}" required>
                                    @error('service_id') <p class="text-danger">{{$message}}</p>@enderror

                                    @php
                                    $total = $service->price;
                                    @endphp
                                    @if($service->discount)
                                    @if($service->discount_type == 'fixed')
                                    <div class="discount-fix">
                                        Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}</span>
                                    </div>
                                    <div class="discount-fix-total">
                                        <span>@php $total = $total-$service->discount; @endphp</span>
                                    </div>
                                    @elseif($service->discount_type == 'percent')
                                    <div class="discount-per">
                                        Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}%</span>
                                    </div>
                                    <div class="discount-per-total" style="margin:6px;">
                                        <span>@php $total = $total-($total*$service->discount/100); @endphp</span>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="total" style="font-size: 24px; font-weight:700;">
                                        Total:<span style="margin: 6px; color:#0a91ed;">{{$total}}</span>
                                        <input hidden type="text" class="form-control" id="total" name="total" value="{{$total}}" required>
                                    </div>
                                    <!-- <p class="text-muted">Tracking Status on: <span class="text-body">11:30pm, Today</span></p> -->
                                    <!-- <img class="align-self-center img-fluid" src="{{asset('assets/images/products')}}/{{$service->image}}" width="250"> -->
                                </div>
                                <!-- /.pricing-card-one -->
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="booking-dash-body">
                                    <div class="pricing-card-one popular-two mt-5">
                                        <div class="row bg-white card-box border-20">
                                            <h4 class="text-dark fw-normal">Fill in the required</h4>
                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Names*</label>
                                                <input type="text" class="form-control" id="names" name="names" value="{{ Auth::user()->name }}" required>
                                                @error('names') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Email*</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                                @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Phone number*</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
                                                @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-6 dash-input-wrapper mb-30">
                                                <label for="">Location*</label>
                                                <input type="text" class="form-control" id="location" name="location" value="{{ Auth::user()->location }}" placeholder="House number and Street name" required>
                                                @error('location') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="booking-dash-body">
                                    <div class="pricing-card-one popular-two mt-25">
                                        <div class="row bg-white card-box border-20">
                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label for="payment" class="col" value="{{ __('payment') }}">Select payment mode</label>
                                                <select class="col form-control" id="payment_mode" name="payment_mode">
                                                    <option value="">Select Payment Mode</option>
                                                    <option value="check-payment">Check payments</option>
                                                    <option value="Cash-on-delivery">Cash on delivery</option>
                                                    <option value="bank-transfer">Bank transfer</option>
                                                </select>
                                                @error('payment_mode') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label>Date *</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                                @error('date') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                <label>Time *</label>
                                                <input type="time" class="form-control" id="time" name="time" required>
                                                @error('time') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->

                                            <div class="dash-input-wrapper">
                                                <label for="">Order Note*</label>
                                                <textarea class="form-control size-lg" cols="10" rows="4" id="notes" name="notes" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                                @error('notes') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                            <!-- /.dash-input-wrapper -->
                                            <div class="button-group d-inline-flex align-items-center mt-30">
                                                <button type="submit" class="dash-btn-two tran3s me-3">Order Now</button>
                                            </div>
                                        </div>
                                        <!-- /.card-box -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
 

</div><!-- End .checkout -->

@endsection