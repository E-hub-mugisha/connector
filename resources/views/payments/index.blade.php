@extends('layouts.base')
@section('title', 'Payment')
@section('content')

@php
    $booking = \App\Models\ServiceBooking::find(request('booking_id'));
@endphp

<h2>Payment Options for {{ $booking->service_name }}</h2>

<p>Your booking for **{{ $booking->service_name }}** is confirmed. How would you like to proceed?</p>

<strong>Selected Payment Mode:</strong> {{ $booking->payment_mode }}

<div>
    <a href="{{ route('payment.now', ['booking_id' => $booking->id]) }}" class="btn btn-primary">Pay Now</a>
    <a href="{{ route('home') }}" class="btn btn-secondary">Pay Later</a>
</div>

@endsection
