@extends('layouts.app')
@section('title','Newsletter')
@section('content')

<div class="container">
    <a href="{{ route('admin.newsletterSubscriptions.index') }}" type="button" class="btn btn-primary btn-sm m-2">
        Back to Lists
    </a>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Subscription</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{ route('admin.newsletterSubscriptions.update', $subscription->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $subscription->email }}" required>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">
                                <span class="text">Update Subscribe</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection