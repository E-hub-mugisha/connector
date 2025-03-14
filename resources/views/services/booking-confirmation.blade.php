@extends('layouts.base')
@section('title', 'Booking Confirmation')
@section('content')
<div class="container text-center">
    <h2>Booking Successful!</h2>
    <p>Your booking for <strong>{{ $booking->service->name }}</strong> has been saved.</p>

    <!-- Bootstrap Modal -->
    <div class="modal fade show" id="paymentModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Complete Your Payment</h5>
                </div>
                <div class="modal-body">
                    <p>Would you like to pay now or later?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Pay Later</a>
                    <a href="{{ route('payment', ['booking_id' => $booking->id]) }}" class="btn btn-success">Proceed to Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Auto-trigger modal -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var myModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        myModal.show();
    });
</script>
@endsection
