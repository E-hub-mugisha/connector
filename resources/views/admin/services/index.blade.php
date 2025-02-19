@extends('layouts.app')
@section('title','Service')
@section('content')

<div class="container">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title') </h6>
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
                            <th>Service</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('image/services')}}/{{$service->image}}" alt="{{$service->name}}" height="50" width="60">
                                </a>
                            </td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->category->name}}</td>
                            <td>{{$service->price}}</td>
                            <td>
                                @if($service->status)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>
                                @if($service->featured)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td>{{$service->created_at}}</td>
                            <td class="action-col">
                                <a class="btn btn-info btn-circle" href="{{route('admin.show_service',$service->slug)}}">view</a>
                                <a class="btn btn-info btn-circle" href="{{route('admin.edit_service',$service->id)}}">Edit</a>
                                <form id="delete-form" action="{{route('admin.delete_service',$service->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure you want to delete this service?')">

                                        <i class="fas fa-trash"></i>
                                    </button>
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
@endsection