@extends('layouts.app')
@section('title','Edit Service Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Service category</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form action="{{ route('admin.update_service_category', $scategory->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" value="{{ __('Category name') }}">Category name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $scategory->name }}" required>
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-group col-md-6">
                            <label for="featured" value="{{ __('featured') }}">featured</label>
                            <select class="form-control" name="featured" id="featured">
                                <option value="{{ $scategory->featured }}">{{ $scategory->featured }}</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-group col-md-6">
                            <label for="image" value="{{ __('Category image') }}">Category image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror

                        </div><!-- End .form-group col-md-6 -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Service category</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection