@extends('layouts.base')
@section('title', 'Payment')
@section('content')
<div class="container text-center">
    <h2>Complete Your Payment</h2>
    <p>You are about to pay <strong>${{ $booking->total }}</strong> for <strong>{{ $booking->service->name }}</strong>.</p>

    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
        <button type="submit" class="btn btn-success">Pay with Flutterwave</button>
    </form>

    <br>
    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
</div>
@endsection
