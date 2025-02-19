@extends('layouts.app')
@section('title','Edit Sliders')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Slider</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="{{ route('admin.update_slider', $slider->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" value="{{ __('slider title') }}">slider title *</label>
                                <input type="text" class="form-control" id="title" name="title" required value="{{ $slider->title}}">
                                @error('title') <p class="text-danger">{{$message}}</p>@enderror
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="status" value="{{ __('status') }}">status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="{{ $slider->status }}">{{ $slider->status}}</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label for="image" value="{{ __('slider image') }}">slider image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image') <p class="text-danger">{{$message}}</p>@enderror

                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Update Slider</span>
                                </button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection