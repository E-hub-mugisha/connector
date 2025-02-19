@extends('layouts.staradmin')
@section('title','service booking')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $bookings->service->name }}</h4>
                    <blockquote class="blockquote">
                        <p class="mb-0">{{ $bookings->notes }}</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p class="fw-bold">Names</p>
                                <p>
                                    {{ $bookings->names }}
                                </p>
                                <p class="fw-bold">
                                    Phone Number
                                </p>
                                <p>
                                    {{ $bookings->phone }}
                                </p>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address class="text-primary">
                                <p class="fw-bold">
                                    E-mail
                                </p>
                                <p class="mb-2">
                                    {{ $bookings->email }}
                                </p>
                                <p class="fw-bold">
                                    Address
                                </p>
                                <p>
                                    {{ $bookings->location }}
                                </p>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">More Information</h4>
                    <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                    <ul class="list-arrow">
                        <li><span class="fw-bold">Amount:</span>{{ $bookings->total }}</li>
                        <li><span class="fw-bold">Status:</span>{{ $bookings->status }}</li>
                        <li><span class="fw-bold">Payment:</span>{{ $bookings->payment_mode }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin grid-margin-md-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Take action</h4>
                    <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                    <div class="row template-demo">
                        <div class="col-md-3">
                            <form id="approve-form" action="{{ route('serviceProviderBooking.approve', $bookings->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this booking?')">
                                    Approve</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form id="complete-form" action="{{ route('serviceProviderBooking.complete', $bookings->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to complete this booking?')">
                                    complete</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form id="approve-form" action="{{ route('serviceProviderBooking.cancel', $bookings->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection