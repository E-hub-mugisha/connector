@extends('layouts.app')
@section('title','Newsletter')
@section('content')
<div class="container">
    <a href="{{ route('admin.newsletterSubscriptions.create') }}" type="button" class="btn btn-primary btn-sm m-2">
        Create New Subscription
    </a>
    <a href="{{ route('admin.newsletterSubscriptions.send') }}" type="button" class="btn btn-warning btn-sm m-2">Send Newsletter</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Newsletter Subscriptions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->email }}</td>
                            <td>{{ $subscription->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.newsletterSubscriptions.show', $subscription->id) }}" class="btn btn-sm"><span class="badge badge-success">Show</span></a>
                                <a href="{{ route('admin.newsletterSubscriptions.edit', $subscription->id) }}" class="btn btn-sm"><span class="badge badge-info">Edit</span></a>
                                <form action="{{ route('admin.newsletterSubscriptions.destroy', $subscription->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm"><span class="badge badge-danger">Delete</span></button>
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