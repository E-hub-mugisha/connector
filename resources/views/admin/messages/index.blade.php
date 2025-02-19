@extends('layouts.app')
@section('title','Messages')
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Phone</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{$message->name}}</td>
                            <td>
                                <a href="mailto:{{$message->email}}">{{$message->email}}</a>
                            </td>
                            <td>{{ Str::limit($message->subject, 50) }}</td>
                            <td>{{ Str::limit($message->message, 50) }}</td>
                            <td>{{$message->phone}}</td>
                            <td>{{$message->created_at}}</td>
                            <td class="action-col">
                                <a class="btn btn-info" href="{{route('admin.messageDetail',$message->id)}}"><span class="btn btn-sm badge-info">view</span></a>
                                <form id="delete-form" action="{{route('admin.delete_message', $message->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">

                                        <span class="btn btn-sm badge-danger">delete</span>
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