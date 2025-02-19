@component('mail::message')
<h2>Hey,</h2> 
<br>
<strong>Email: </strong>{{ $data->email }} <br>

<h2>New subscription</h2>
  
Thank you,

{{ config('app.name') }}
@endcomponent