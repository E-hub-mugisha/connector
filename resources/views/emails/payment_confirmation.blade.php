<!-- resources/views/emails/payment_confirmation.blade.php -->

@component('mail::message')
# Payment Confirmation

Dear {{ $booking->user->name }},

We are pleased to inform you that your payment for the booking ID: {{ $booking->id }} has been successfully processed.

@component('mail::table')
| **Booking ID**        | {{ $booking->id }}     |
| --------------------- | ---------------------- |
| **Amount Paid**       | {{ $booking->total }}  |
| **Payment Method**    | {{ ucfirst($booking->payment_mode) }} |
| **Transaction ID**    | {{ $booking->payment->transaction_id }} |
@endcomponent

Thank you for your payment!

@component('mail::button', ['url' => route('home')])
Go to Dashboard
@endcomponent

Best regards,  
{{ config('app.name') }} Team
@endcomponent
