@extends('layouts.app')
@section('title','Provider Ratings')
@section('content')

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Provider Ratings</h1>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Our Service Providers Ratings</h6>
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
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ratings as $feedback)
                        <tr>
                            <td>{{$feedback->id}}</td>
                            <td>{{$feedback->name}}</td>
                            <td>
                                {{$feedback->email}}
                                
                            </td>
                            <td>{{$feedback->message}}</td>
                            <td>@if($feedback->approved == 1 )
                            <span class="badge badge-success">Approved</span>
                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                            </td>
                            <td>{{$feedback->created_at}}</td>
                            <td class="action-col">
                                <form id="approve-form" action="{{ route('admin.RatingApprove', $feedback->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this Rating?')">
                                    Approve</button>
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