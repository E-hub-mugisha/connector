@extends('layouts.base')

@section('title', 'Booking')

@section('content')
<div>
    <!-- Inner Banner (No changes) -->

    <!-- Pricing Section -->
    <section class="pricing-section bg-color pt-100 lg-pt-70 pb-90 lg-pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" id="bookingForm">
                        @csrf

                        <!-- Step 1: Service and User Info -->
                        <div class="step pricing-card-one border-0 mt-25" id="step1">
                            <div class="row">
                                <div class="col-lg-5 col-md-5"><!-- Service Name and Provider Info -->
                                    <h3>Booking details</h3>
                                    <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;"> Service Name: <span class="text-muted mb-2">{{ $service->name }}</span></p>
                                    <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Service Category: <span class="text-muted mb-2">{{ $service->category->name }}</span></p>
                                    <p class="text-body fw-bold mb-2" style="font-size: 18px; font-weight:700;">Provider Name: <span class="text-muted mb-2">{{ $service->provider->sprovider_name }}</span></p>
                                    <input hidden type="text" class="form-control" id="proEmail" name="proEmail" value="{{ $service->provider->proEmail }}" required>
                                    <input hidden type="text" class="form-control" id="service_provider_id" name="service_provider_id" value="{{ $service->service_provider_id }}" required>
                                    <input hidden type="text" class="form-control" id="service_id" name="service_id" value="{{ $service->id }}" required>
                                    <input hidden type="text" class="form-control" id="service_name" name="service_name" value="{{ $service->name }}" required>
                                    @php
                                    $total = $service->price;
                                    @endphp
                                    @if($service->discount)
                                    @if($service->discount_type == 'fixed')
                                    <div class="discount-fix">
                                        Discount: <span style="margin: 6px; color:#ff1e00;">{{ $service->discount }}</span>
                                    </div>
                                    <div class="discount-fix-total">
                                        <span>@php $total = $total - $service->discount; @endphp</span>
                                    </div>
                                    @elseif($service->discount_type == 'percent')
                                    <div class="discount-per">
                                        Discount: <span style="margin: 6px; color:#ff1e00;">{{ $service->discount }}%</span>
                                    </div>
                                    <div class="discount-per-total" style="margin: 6px;">
                                        <span>@php $total = $total - ($total * $service->discount / 100); @endphp</span>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="total" style="font-size: 24px; font-weight:700;">
                                        Total: <span style="margin: 6px; color:#0a91ed;">{{ $total }}</span>
                                        <input hidden type="text" class="form-control" id="total" name="total" value="{{ $total }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <div class="row booking-dash-body"><!-- User Info Inputs -->
                                        <h3>Fill in the details</h3>
                                        <div class="col-md-6 dash-input-wrapper mb-30">
                                            <input type="text" class="form-control" id="names" name="names" value="{{ Auth::user()->name }}" placeholder="Enter your Names" required>
                                        </div>
                                        <div class="col-md-6 dash-input-wrapper mb-30">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter your email" required>
                                        </div>
                                        <div class="col-md-6 dash-input-wrapper mb-30">
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter your phone number" required>
                                        </div>
                                        <div class="col-md-6 dash-input-wrapper mb-30">
                                            <input type="text" class="form-control" id="location" name="location" value="{{ Auth::user()->location }}" placeholder="Enter your location" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary float-start" id="nextToStep2">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Step 2: Payment, Date, Time, and Notes -->
                        <div class="step pricing-card-one border-0 mt-25" id="step2" style="display:none;">
                            <div class="row">
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="payment_mode">Select payment mode</label>
                                    <select class="form-control" id="payment_mode" name="payment_mode">
                                        <option value="">Select Payment Mode</option>
                                        <option value="check-payment">Mobile money</option>
                                        <option value="Cash-on-delivery">Cash on delivery</option>
                                        <option value="bank-transfer">Bank transfer</option>
                                    </select>
                                </div>
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="date">Date *</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="col-md-4 dash-input-wrapper mb-30">
                                    <label for="time">Time *</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                                <div class="col-md-12 dash-input-wrapper mb-30">
                                    <label for="notes">Order Note*</label>
                                    <textarea class="form-control size-lg" cols="10" rows="4" id="notes" name="notes" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="backToStep1">Back</button>
                            <button type="button" class="btn btn-primary" id="nextToStep3">Next</button>
                        </div>

                        <!-- Step 3: Confirmation and Staff Selection -->
                        <div class="step pricing-card-one border-0 mt-25" id="step3" style="display:none;">
                            <div class="row">
                                <div class="col-md-6 dash-input-wrapper mb-30">
                                    <label for="staff_id">Select Staff you want or leave it if none</label>
                                    <select class="form-control" id="staff_id" name="staff_id">
                                        <option value="">Select Staff</option>
                                        @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="backToStep2">Back</button>
                            <button type="button" class="btn btn-primary" id="previewBooking">Preview</button>
                        </div>

                        <!-- Preview Step -->
                        <div class="step pricing-card-one border-0 mt-25" id="preview" style="display:none;">
                            <h4>Preview Your Booking</h4>
                            <div id="previewDetails"></div>
                            <button type="button" class="btn btn-secondary" id="backToStep3">Back</button>
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById("nextToStep2").addEventListener("click", function() {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    });

    document.getElementById("backToStep1").addEventListener("click", function() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
    });

    document.getElementById("nextToStep3").addEventListener("click", function() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step3").style.display = "block";
    });

    document.getElementById("backToStep2").addEventListener("click", function() {
        document.getElementById("step3").style.display = "none";
        document.getElementById("step2").style.display = "block";
    });

    document.getElementById("previewBooking").addEventListener("click", function() {
        var names = document.getElementById("names").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var location = document.getElementById("location").value;
        var paymentMode = document.getElementById("payment_mode").value;
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;
        var notes = document.getElementById("notes").value;
        var staff = document.getElementById("staff_id").value;

        var previewDetails = `
            <p><strong>Name:</strong> ${names}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Phone:</strong> ${phone}</p>
            <p><strong>Location:</strong> ${location}</p>
            <p><strong>Payment Mode:</strong> ${paymentMode}</p>
            <p><strong>Date:</strong> ${date}</p>
            <p><strong>Time:</strong> ${time}</p>
            <p><strong>Notes:</strong> ${notes}</p>
            <p><strong>Selected Staff:</strong> ${staff}</p>
        `;

        document.getElementById("previewDetails").innerHTML = previewDetails;
        document.getElementById("step3").style.display = "none";
        document.getElementById("preview").style.display = "block";
    });

    document.getElementById("backToStep3").addEventListener("click", function() {
        document.getElementById("preview").style.display = "none";
        document.getElementById("step3").style.display = "block";
    });
</script>

@endsection