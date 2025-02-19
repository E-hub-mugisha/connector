@extends('layouts.app')
@section('title','Service Provider')
@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="container">
            <div class="row" style="border-radius: 16px;">
                <div class="well col-md-6 profile">
                    <figure>
                        @if($UserProvide->image)
                        <img src="{{asset('image/profile')}}/{{$UserProvide->image}}" alt="{{$UserProvide->user->name}}" class="img-circle" style="width:75px;" id="user-img">
                        @else
                        <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$UserProvide->user->name}}" class="img-circle" style="width:75px;" id="user-img">
                        @endif
                    </figure>
                    <h5><strong id="user-name">{{ $UserProvide->sprovider_name }}</strong></h5>
                    <p style="font-size: smaller;" id="user-frid">{{ $UserProvide->user->phone }}  </p>
                    <p style="font-size: smaller;overflow-wrap: break-word;" id="user-email">{{ $UserProvide->proEmail }}  </p>
                    <p style="font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">{{ $UserProvide->status }}</span></p>
                    <div class="divider text-center"></div>
                    <p style="font-size: smaller;"><strong>Service Category</strong></p>
                    <p style="font-size: smaller;" id="user-role">{{ $UserProvide->category->name }} </p>
                    <div class="divider text-center"></div>
                    <div class="col-lg-12 left" style="overflow-wrap: break-word;">
                        <h4>
                            <p><strong id="user-globe-rank">Address </strong></p>
                        </h4>
                        <p><small class="label label-success">{{ $UserProvide->service_locations }} </small></p>
                        <!--<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
                    </div>
                    <div class=" col-lg-12 left" style="overflow-wrap: break-word;">
                        <h4>
                            <p><strong id="user-college-rank">About </strong></p>
                        </h4>
                        <p> <small class="label label-warning">{{ $UserProvide->about }} </small></p>
                        <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
                    </div>
                </div>
                <div class="well col-md-6 profile">
                    <h5><strong id="user-name">Services</strong></h5>
                    @if($services)
                    @foreach( $services as $service )
                    <span style="font-size: smaller;" id="user-frid">{{ $service->name}} </span>,
                    @endforeach
                    @else
                    <span style="font-size: smaller;" id="user-frid">No services available</span>
                    @endif
                    <div class="divider text-center"></div>
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$UserProvide->city}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5><strong id="user-name">Reviews</strong></h5>
                    @if($reviews)
                    @foreach( $reviews as $review )
                    <li style="font-size: smaller;" id="user-frid">{{ $review->comment }}</li>
                    @endforeach
                    @else
                    <li style="font-size: smaller;" id="user-frid">No reviews available</li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection