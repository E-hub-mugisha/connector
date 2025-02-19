@extends('layouts.staradmin')
@section('title', 'Service Detail')
@section('content')
<div class="content-wrapper">
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
                    <h4 class="card-title">List of inclusion</h4>
                    <ul class="list-ticked">
                        @foreach(explode("|",$details->inclusion) as $inclusion)
                        <li>{{$inclusion}}</li>
                        @endforeach
                    </ul>
                    <h4 class="card-title">Exclusion</h4>
                    <p class="card-description">List of exclude service</p>
                    <ul class="list-arrow">
                        @foreach(explode("|",$details->exclusion) as $exclusion)
                        <li>{{$exclusion}}</li>
                        @endforeach
                    </ul>
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
                                <p class="fw-bold">Location</p>
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
                            <img src="{{asset('image/services')}}/{{$details->image}}" alt="{{$details->name}}" width="100px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">More Action</h4>
                    <div class="template-demo">
                        <a href="{{ route('serviceProvider.edit', $details->id) }}" type="button" class="btn btn-primary btn-rounded btn-fw">Edit Service</a>
                        <form id="delete-form" action="{{ route('serviceProvider.destroy', $details->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded btn-fw" onclick="return confirm('Are you sure you want to delete this service?')">
                                <i class="mdi mdi-delete"> </i>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection