@extends('layouts.app')
@section('title','Add Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow mb-1" style="padding:24px;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Service Category</h6>
            </div>
            <!-- Card Body -->
            <div class="container">
                <div id="signin-2">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{ route('admin.create_service_category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" value="{{ __('Category name') }}">Category name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="subcategory" value="{{ __('SubCategory') }}">subcategory</label>
                            <select class="form-control" name="service_category_id" id="service_category_id">
                                <option value="">None</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="image" value="{{ __('Category image') }}">Category image</label>
                            <input type="file" class="form-control" id="image" name="image"required>
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror

                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Add Category</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection