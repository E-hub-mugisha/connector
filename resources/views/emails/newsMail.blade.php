@component('mail::message')
<h2>Hey, It's me {{ $data->names }}</h2> 
<br>
<strong>Email: </strong>{{ $data->email }} <br>

<h2>New subscription</h2>
  
Thank you,

{{ config('app.name') }}
@endcomponent