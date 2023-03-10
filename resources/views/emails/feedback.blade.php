@component('mail::message')
<h2>Hey {{ $responseData['names'] }}, </h2> 
<br>
<h2>It's me {{ $responseData['name'] }}</h2>
<h2>Your request has been {{ $responseData['status'] }}</h2>

Thank you,

{{ config('app.name') }}
@endcomponent

