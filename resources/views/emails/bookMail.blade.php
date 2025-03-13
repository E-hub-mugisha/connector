@component('mail::message')
# Hello {{ $mailData['names'] }},  

You've received a new **service request** from a customer. Below are the details:

---

## 🔹 **User Details**  
📛 **Name:** {{ $mailData['names'] }}  
📧 **Email:** [{{ $mailData['email'] }}](mailto:{{ $mailData['email'] }})  
📞 **Phone:** [{{ $mailData['phone'] }}](tel:{{ $mailData['phone'] }})  
📍 **Location:** {{ $mailData['location'] }}  

---

## 🛠 **Service Request**  
💼 **Requested Service:** {{ $mailData['service_name'] }}  
📅 **Date & Time:** {{ $mailData['date'] }} at {{ $mailData['time'] }}  
💳 **Payment Mode:** {{ $mailData['payment_mode'] }}  

@if(!empty($mailData['notes']))
📝 **Additional Notes:**  
_{{ $mailData['notes'] }}_
@endif

---

## ✅ **Next Steps**  
Click the button below to review and confirm the booking.

@component('mail::button', ['url' => route('sprovider.dashboard')])
🔍 View Booking Details
@endcomponent

If you have any questions, feel free to reach out.  

Thanks & Best Regards,  
**{{ config('app.name') }}**  

@endcomponent
