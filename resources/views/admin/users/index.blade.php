@extends('layouts.app')
@section('title','Users')
@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Meet Our Users </h6>
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
                            <th>User name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>UTYPE</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                @if($user->image)
                                <img src="{{asset('assets/images/sproviders')}}/{{$user->image}}" alt="{{$user->name}}" width="60" height="50">
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$user->name}}" width="60" height="50">
                                @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>

                                {{$user->email}}

                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->utype}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.activate', $user->id) }}" 
   onclick="return confirm('Are you sure you want to activate this user as an admin?');">
    <span class="badge badge-primary">Activate Admin</span>
</a>

<a class="dropdown-item" href="{{ route('customer.activate', $user->id) }}" 
   onclick="return confirm('Are you sure you want to activate this user as a customer?');">
    <span class="badge badge-success">Activate Customer</span>
</a>

<a class="dropdown-item" href="{{ route('provider.activate', $user->id) }}" 
   onclick="return confirm('Are you sure you want to activate this user as a service provider?');">
    <span class="badge badge-warning">Activate Provider</span>
</a>

                                        <form id="delete-form" action="{{route('users.delete',$user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <span class="badge badge-danger">Delete User</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
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