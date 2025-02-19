@extends('layouts.guest')
@section('title','Service booking detail')
@section('content')


        <div class="container">
            <section class="h-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12">
                            <div class="card" style="border-radius: 10px;">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Service Provider: <span>{{
                                                $booking->serviceProvider->sprovider_name }}</span></p>
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Service booked: <span>{{
                                                $booking->service->name }}</span></p>
                                    </div>
                                    <div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="{{asset('image/services')}}/{{$booking->service->image}}" class="img-fluid"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="card card-raised bg-light">
                                                <div class="card-body pt-2">
                                                    <h3 class="fw-bold mb-0">Booking Details</h3>

                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Names:</span>{{$booking->names}}
                                                    </p>
                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Email:</span>{{$booking->email}}
                                                    </p>

                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Phone:</span>{{$booking->phone}}
                                                    </p>
                                                    <p class="text-muted mb-0"><span
                                                            class="fs--1 text-bold mb-0">Location:</span>{{$booking->location}}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6 mb-4">
                                            <div class="card card-shadow">
                                                <div class="card-body py-5">
                                                    <h5 class="fw-bold fs-1 text-darker mb-3">Order Detail : </h5>
                                                    <p class="text-muted mb-0">Date & Time : <span
                                                            class="fs--1 text-muted mb-0">{{$booking->date}} at
                                                            {{$booking->time}}</span></p>
                                                    <p class="text-muted mb-0">Status : <span
                                                            class="fs--1 text-muted mb-0">{{$booking->status}}</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Payment Mode : <span
                                                            class="fs--1 text-muted mb-0">{{$booking->payment_mode}}</span>
                                                    </p>
                                                    <p class="fs--1 text-uppercase text-gray-700 mb-0">Total
                                                        Amount:<span
                                                            class="fs--1 text-muted mb-0">{{$booking->total}}</span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-12 justify-content-between mb-5">
                                            <div class="card card-raised bg-light">
                                                <div class="card-body pt-2">
                                                    <p class="fw-bold mb-0">Order Note : </p>
                                                    <p>{{$booking->notes}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pt-2">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Reschedule
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    @if(Session::has('message'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{Session::get('message')}}</div>
                                                    @endif
                                                    <form action="{{ route('BookingReschedule', $booking->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reschedule
                                                                Booking</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                                <label>Date *</label>
                                                                <input type="date" class="form-control" id="date"
                                                                    name="date" required>
                                                                @error('date') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <!-- /.dash-input-wrapper -->

                                                            <div class="col-md-4 dash-input-wrapper mb-30">
                                                                <label>Time *</label>
                                                                <input type="time" class="form-control" id="time"
                                                                    name="time" required>
                                                                @error('time') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <!-- /.dash-input-wrapper -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Reschedule
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('customer.cancelBooking', $booking->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel
                                                Booking</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    
@endsection