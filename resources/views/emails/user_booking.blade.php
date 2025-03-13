@component('mail::message')
# Booking Confirmation

Hello **{{ $mailData['names'] }}**,

Thank you for booking **{{ $mailData['service_name'] }}**. Your booking details are below:

### **Booking Details**
- **Service:** {{ $mailData['service_name'] }}
- **Date & Time:** {{ $mailData['date'] }} at {{ $mailData['time'] }}
- **Payment Mode:** {{ $mailData['payment_mode'] }}
- **Location:** {{ $mailData['location'] }}

@if($mailData['notes'])
- **Notes:** {{ $mailData['notes'] }}
@endif

@component('mail::button', ['url' => route('home.payment')])
Proceed to Payment
@endcomponent

If you have any questions, feel free to contact us.

Thanks,<br>
**{{ config('app.name') }}**
@endcomponent
