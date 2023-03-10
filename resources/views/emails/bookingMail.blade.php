@component('mail::message')
<h2>Hey, It's me {{ $data->names }}</h2> 
<br>
    
<strong>User details: </strong><br>
<strong>Name: </strong>{{ $data->names }} <br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Phone: </strong>{{ $data->phone }} <br>
<strong>Location: </strong>{{ $data->location }} <br>

<h2>I am requesting for {{$data->service_name}}</h2>
<strong>Service Provider: </strong>{{ $data->service_provider }} <br>
<strong>When: </strong>{{ $data->date }} at {{ $data->time}} <br><br>
<strong>Payment Mode: </strong>{{ $data->payment_mode }} <br>
  
Thank you,

{{ config('app.name') }}
@endcomponent