@extends('layouts.staradmin')
@section('title', 'Services')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Services</h4>
                        </div>
                        <div>
                            <a href="{{route('serviceProvider.create')}}" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add Service</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th>Service Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{asset('image/services')}}/{{$service->image}}" alt="{{$service->name}}" height="50" width="50"/>
                                    </td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->category->name}}</td>
                                    <td class="text-danger"> {{$service->price}} <i class="ti-arrow-down"></i></td>
                                    <td>
                                        @if($service->status)
                                        <label class="badge badge-success">Active</label>
                                        @else
                                        <label class="badge badge-danger">Inactive</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('serviceProvider.show', $service->slug) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <form id="delete-form" action="{{ route('serviceProvider.destroy', $service->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">
                                                <i class="mdi mdi-delete"> </i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection