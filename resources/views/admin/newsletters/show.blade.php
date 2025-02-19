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
                    <h6 class="m-0 font-weight-bold text-primary">Newsletter Subscription detail</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Email: {{ $subscription->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection