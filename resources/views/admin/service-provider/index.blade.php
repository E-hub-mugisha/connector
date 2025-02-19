@extends('layouts.app')
@section('title','Service Provider')
@section('content')

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Provider</h1>
        <a href="{{ route('admin.AddServiceProviders')}}" class="btn btn-primary" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Service Provider</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Our Service Providers </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sproviders as $sprovider)
                        <tr>
                            <td>{{$sprovider->id}}</td>
                            <td>
                                @if($sprovider->image)
                                <img src="{{asset('image/profile')}}/{{$sprovider->image}}" alt="{{$sprovider->user->name}}" width="60" height="50">
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$sprovider->user->name}}" width="60" height="50">
                                @endif
                            </td>
                            <td>{{$sprovider->user->name}}</td>
                            <td>
                                @if($sprovider->service_category_id)
                                {{$sprovider->category->name}}
                                @endif
                            </td>
                            <td>{{$sprovider->user->phone}}</td>
                            <td>{{$sprovider->service_locations}}</td>
                            <td>{{$sprovider->status}}</td>
                            <td>{{$sprovider->created_at}}</td>
                            <td class="action-col">
                                <a class="btn btn-sm" href="{{ route('admin.ShowServiceProviders',$sprovider->id)}}">
                                    <span class="btn btn-sm badge-info">Show</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection