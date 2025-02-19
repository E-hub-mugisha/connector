@component('mail::message')
<h2>Hey, It's me {{ $mailData['name'] }}</h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong>{{ $mailData['name'] }} <br>
<strong>Email: </strong>{{ $mailData['email'] }} <br>
<strong>Phone: </strong>{{ $mailData['phone'] }} <br>
<strong>Subject: </strong>{{ $mailData['subject'] }} <br>
<strong>Message: </strong>{{ $mailData['message'] }} <br><br>
  
Thank you,

{{ config('app.name') }}
@endcomponent