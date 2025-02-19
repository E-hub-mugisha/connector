@extends('layouts.guest')
@section('title', 'Service Detail')
@section('content')


<div class="container">
    <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$details->name}}</h4>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote blockquote-primary">
                        <footer class="blockquote-footer">About this service</footer>
                        <p>{{$details->description}}</p>

                    </blockquote>

                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Address</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <p>
                                    {{$details->location}}
                                </p>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Image</h4>
                    <div class="media">
                        <div class="media-body">
                            <img src="{{$details->image}}" alt="{{$details->name}}" width="100px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <h4 class="card-title">List of inclusion</h4>
                            @foreach(explode("|",$details->inclusion) as $inclusion)
                                <p>{{$inclusion}}</p>
                                @endforeach
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <h4 class="card-title">Exclusion</h4>
                            <p class="card-description">List of exclude service</p>
                            @foreach(explode("|",$details->exclusion) as $exclusion)
                                <p>{{$exclusion}}</p>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="template-demo">
                        <a href="{{ route('CustomerService.book', $details->slug) }}" type="button"
                            class="btn btn-primary btn-rounded btn-fw">Book Service</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection