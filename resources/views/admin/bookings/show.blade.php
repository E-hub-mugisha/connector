@extends('layouts.app')
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
                                <h2 class="lead fw-normal mb-0">{{ $booking->service->name }} Service booked</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{asset('image/services')}}/{{$booking->service->image}}" class="img-fluid" alt="image">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="fw-bold mb-0">Booking Details</h5>

                                        <p class="mb-0"><span class="fs--1 text-bold mb-0">Names:</span>{{$booking->names}} </p>
                                        <p class="mb-0"><span class="fs--1 text-bold mb-0">Email:</span>{{$booking->email}} </p>

                                        <p class="mb-0"><span class="fs--1 text-bold mb-0">Phone:</span>{{$booking->phone}} </p>
                                        <p class="mb-0"><span class="fs--1 text-bold mb-0">Location:</span>{{$booking->location}}</p>

                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="fw-bold fs-1 text-darker mb-3">Order Detail : </h5>
                                        <p class="mb-0">Date & Time : <span class="fs--1 mb-0">{{$booking->date}} at {{$booking->time}}</span></p>
                                        <p class="mb-0">Status : <span class="fs--1 mb-0">{{$booking->status}}</span></p>
                                        <p class="mb-0">Payment Mode : <span class="fs--1 mb-0">{{$booking->payment_mode}}</span></p>
                                        <p class="fs--1 text-uppercase text-gray-700 mb-0">Total Amount:<span class="fs--1 mb-0">{{$booking->total}}</span></p>
                                    </div>
                                    <div class="col-sm-6 col-lg-12 mb-5 mt-5">
                                        <p class="fw-bold mb-0">Order Note : </p>
                                        <p>{{$booking->notes}}</p>

                                    </div>
                                    <div class="col-md-12 mb-4 pt-2">

                                        <a href="#" type="button" class="btn btn-primary px-3"><i class="fas fa-reply" aria-hidden="true"></i>Back</a>
                                        <a onclick="confirm('are you sure, you want to update this!')" type="button" class="btn btn-success px-3"><i class="far fa-thumbs-up" aria-hidden="true"></i>Accept</a>
                                        <a onclick="confirm('are you sure, you want to cancel this!')" type="button" class="btn btn-danger px-3"><i class="fas fa-bolt" aria-hidden="true"></i>Cancel</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection