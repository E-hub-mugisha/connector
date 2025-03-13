@extends('layouts.app')
@section('title', $service->name )
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Grow In Utility -->
        <div class="col-lg-10">

            <div class="card shadow position-relative mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service name: {{ $service->name  }}</h6>
                    <p>Category: {{$service->category->name}}</p>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('image/services')}}/{{$service->image}}" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Description</h4>
                            <p>{!! $service->description !!}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Inclusion</h4>
                            @foreach(explode("|",$service->inclusion) as $inclusion)
                            <p>{!! $inclusion !!}</p>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <h4>Exclusion</h4>
                            @foreach(explode("|",$service->exclusion) as $exclusion)
                            <p>{!! $exclusion !!}</p>
                            @endforeach
                        </div>
                        <div class="col-md-12 py-3">
                            <span>Location: {{ $service->location }}</span> <span>Price: {{$service->price}}</span>
                            @php $total = $service->price; @endphp
                            @if($service->discount)
                            @if($service->discount_type == 'fixed')
                            <span style="margin: 6px; color:#ff1e00;">Discount: {{$service->discount}}</span>
                            <span>@php $total = $total-$service->discount; @endphp</span>
                            @elseif($service->discount_type == 'percent')
                            <span style="margin: 6px; color:#ff1e00;">Discount:{{$service->discount}}%</span>
                            @php $total = $total-($total*$service->discount/100); @endphp</span>
                            @endif
                            @endif
                            <span style="margin: 6px;">Total:{{$total}}</span>
                        </div>
                        <div class="col-md-12 py-3">
                            <div class="container">
                                <h2 class="mb-1">View on map:</h2>
                                <div class="gmap_canvas h-100 w-100">
                                    <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$service->location}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection