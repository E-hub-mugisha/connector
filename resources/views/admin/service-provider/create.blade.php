@extends('layouts.app')
@section('title','Create Service Provider')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title') </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{ route('ServiceProviderAdd' )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" value="{{ __('name') }}">Names *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @error('name') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="email" value="{{ __('name') }}">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                        @error('email') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="phone" value="{{ __('phone') }}">Phone *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="password" value="{{ __('password') }}">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="text">Add Service Provider</span>
                    </button>
                </div><!-- End .form-footer -->

            </form>
        </div>
    </div>
</div>

@endsection