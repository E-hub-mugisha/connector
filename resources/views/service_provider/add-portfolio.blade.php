@extends('layouts.base')
@section('title', 'Providers By Category')
@section('content')

<div class="content-wrapper">
    <form action="/createPortfolioService" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic form elements</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <div class="form-group">
                            <label for="discount type" value="{{ __('discount type') }}">Discount type</label>
                            <select class="form-control" name="discount_type" id="discount_type">
                                @foreach( $services as $service)
                                <option value="">Select type</option>
                                @endforeach
                            </select>
                            @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="discount" value="{{ __('discount') }}">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount">
                            @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>File upload</label>
                                <input type="file" name="images[]" id="inputImage" multiple class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="dashboard-body">
    <div class="position-relative">
        @include('livewire.sprovider.navbar')

        <h2 class="main-title">Post a image on a Service</h2>

        <div class="bg-white card-box border-20">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{ url('/images/upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- /.dash-input-wrapper -->
                <div class="row align-items-end">
                    <div class="col-md-6">
                        <div class="dash-input-wrapper mb-30">
                            <label for="service" value="{{ __('service') }}">Service name</label>
                            <select class="nice-select" name="service_id" id="service_id">
                                <option value="">Select service </option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                            @error('service_id') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <!-- /.dash-input-wrapper -->
                    </div>
                </div>

                <!-- /.dash-input-wrapper -->
                <div class="dash-btn-one d-inline-block position-relative me-3">
                    <label for="image1" value="{{ __('image1') }}">image1</label>
                    <i class="bi bi-plus"></i>
                    Upload Image1
                    <input type="file" name="images[]" multiple class="form-control" required>

                </div>
                <small>Upload image</small>

                <!-- /.card-box -->

                <div class="button-group d-flex align-items-center mt-30">
                    <button type="submit" class="dash-btn-two tran3s me-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.dashboard-body -->
@endsection