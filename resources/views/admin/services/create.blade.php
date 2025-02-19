@extends('layouts.app')
@section('title','Create Service')
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
            <form action="{{ route('admin.post_service' )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="service_provider" value="{{ __('service_provider') }}">Service provider</label>
                        <select class="form-control" name="service_provider_id" id="service_provider_id">
                            <option value="">-- select service provider --</option>
                            @foreach($sprovider as $provider)
                            <option value="{{$provider->id}}">{{$provider->sprovider_name}}</option>
                            @endforeach
                        </select>
                        @error('service_provider_id') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="name" value="{{ __('name') }}">Service name *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @error('name') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
<div class="col-md-4 form-group">
                        <label for="service_category" value="{{ __('service_category') }}">Service category</label>
                        <select class="form-control" name="service_category_id" id="service_category_id">
                            <option value="">-- select service category --</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('service_category_id') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="form-group col-md-4">
                            <label for="sub_category" value="{{ __('sub_category') }}">Sub-category</label>
                            <input type="text" class="form-control" id="sub_category" name="sub_category" required>
                            @error('sub_category') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                    <div class="col-md-4 form-group">
                        <label for="tagline" value="{{ __('tagline') }}">Tagline</label>
                        <input type="text" class="form-control" id="tagline" name="tagline" required>
                        @error('tagline') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    
                    <div class="col-md-4 form-group">
                        <label>Duration *</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                        @error('duration') <p class="text-danger">{{$message}}</p>@enderror

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="price" value="{{ __('price') }}">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                        @error('price') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="discount" value="{{ __('discount') }}">Discount</label>
                        <input type="text" class="form-control" id="discount" name="discount">
                        @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="discount type" value="{{ __('discount type') }}">Discount type</label>
                        <select class="form-control" name="discount_type">
                            <option value="">-- select discount type --</option>
                            <option value="fixed">Fixed</option>
                            <option value="percent">Percent</option>
                        </select>
                        @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="featured" value="{{ __('featured') }}">featured</label>
                        <select class="form-control" name="featured">
                            <option value="" disabled>-- select feature --</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div><!-- End .form-group -->
                    <div class="col-md-4 form-group">
                        <label for="location" value="{{ __('location') }}">location</label>
                        <input type="text" class="form-control" id="location" name="location">
                        @error('location') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="description" value="{{ __('description') }}">description</label>
                        <textarea class="form-control" id="description" name="description" required>enter the description </textarea>
                        @error('description') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="inclusion" value="{{ __('inclusion') }}">Inclusion</label>
                        <textarea class="form-control" id="inclusion" name="inclusion" required>enter the inclusion </textarea>
                        @error('inclusion') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->

                    <div class="col-md-4 form-group">
                        <label for="exclusion" value="{{ __('exclusion') }}">Exclusion</label>
                        <textarea class="form-control" id="exclusion" name="exclusion" required>Enter the Exclusion</textarea>
                        @error('exclusion') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->

                    <div class="form-group">
                        <label for="newimage" value="{{ __('image') }}">image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image') <p class="text-danger">{{$message}}</p>@enderror
                    </div><!-- End .form-group -->
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="text">Add Service</span>
                    </button>
                </div><!-- End .form-footer -->

            </form>
        </div>
    </div>
</div>

@endsection