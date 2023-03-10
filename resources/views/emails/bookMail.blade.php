@component('mail::message')
<h2>Hey, It's me {{ $mailData['names'] }}</h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong>{{ $mailData['names'] }} <br>
<strong>Email: </strong>{{ $mailData['email'] }} <br>
<strong>Phone: </strong>{{ $mailData['phone'] }} <br>
<strong>Location: </strong>{{ $mailData['location'] }} <br>

<h2>I am requesting for {{ $mailData['service_name'] }}</h2>
<strong>When: </strong>{{ $mailData['date'] }} at {{ $mailData['time'] }} <br><br>
<strong>Payment Mode: </strong>{{ $mailData['payment_mode'] }} <br>
<br>
@component('mail::button', ['url' => route('sprovider.dashboard')])
Verify
@endcomponent


Thank you,

{{ config('app.name') }}
@endcomponent