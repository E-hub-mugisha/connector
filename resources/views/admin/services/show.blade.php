@extends('layouts.app')
@section('title','Service Details')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">@yield('title')</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Grow In Utility -->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $service->name  }} Service Information</h6>
                    <p>{{$service->category->name}}</p>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets/img/undraw_posting_photo.svg')}}" alt="">
                    </div>
                    <p>{{ $service->description }}</p>
                    <h4>Inclusion</h4>
                    @foreach(explode("|",$service->inclusion) as $inclusion)
                    <p>{{$inclusion}}</p>
                    @endforeach
                    <h4>Exclusion</h4>
                    @foreach(explode("|",$service->exclusion) as $exclusion)
                    <p>{{$exclusion}}</p>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Fade In Utility -->
        <div class="col-lg-6">

            <div class="card position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Others Information</h6>
                </div>
                <div class="card-body">
                    <div class="small mb-1">Location:<span>{{ $service->location }}</span></div>
                    <span>Price:</span>
                    <div>
                        @php
                        $total = $service->price;
                        @endphp
                        @if($service->discount)
                        @if($service->discount_type == 'fixed')
                        <div class="discount-fix">
                            Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}</span>
                        </div>
                        <div class="discount-fix-total">
                            <span>@php $total = $total-$service->discount; @endphp</span>
                        </div>
                        @elseif($service->discount_type == 'percent')
                        <div class="discount-per">
                            Discount:<span style="margin: 6px; color:#ff1e00;">{{$service->discount}}%</span>
                        </div>
                        <div class="discount-per-total" style="margin:6px;">
                            <span>@php $total = $total-($total*$service->discount/100); @endphp</span>
                        </div>
                        @endif
                        @endif
                        <div class="total">
                            Total:<span style="margin: 6px;">{{$total}}</span>
                        </div>
                    </div>
                    <div class="small mb-1">View on map:</div>
                    <div class="gmap_canvas h-100 w-100">
                        <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$service->location}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection