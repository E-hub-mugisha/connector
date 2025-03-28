@extends('layouts.staradmin')
@section('title', 'Edit Service')
@section('content')

<div class="content-wrapper">
    <form action="{{ route('serviceProvider.update', $service->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method( "PUT")
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body row">
                        <h4 class="card-title">Basic Information</h4>
                        <p class="card-description">
                            Fill in the form
                        </p>
                        <div class="form-group col-md-4">
                            <label for="exampleInputUsername1">Service name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{$service->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="service_category" value="{{ __('service_category') }}">Service category</label>
                            <select class="form-control" name="service_category_id" id="service_category_id">
                                <option value="{{$sprovider->category->id}}">{{$service->category->name}}</option>

                                <option value="{{$sprovider->category->id}}">{{$sprovider->category->name}}</option>

                            </select>
                            @error('service_category_id') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sub_category" value="{{ __('sub_category') }}">Sub-category</label>
                            <input type="text" class="form-control" id="sub_category" name="sub_category" value="{{$service->subCategories->name}}" required>
                            @error('sub_category') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="discount type" value="{{ __('discount type') }}">Discount type</label>
                            <select class="form-control" name="discount_type" id="discount_type">
                                <option value="">{{$service->discount_type}}</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="discount" value="{{ __('discount') }}">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="{{$service->discount}}">
                            @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Duration *</label>
                            <input type="text" class="form-control" id="duration" name="duration" required value="{{$service->duration}}">
                            @error('duration') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price" value="{{ __('price') }}">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required value="{{$service->price}}">
                            @error('price') <p class="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="description" value="{{ __('description') }}">description</label>
                                <textarea class="form-control" id="content" name="description" required>{{$service->description}}"</textarea>
                                @error('description') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inclusion" value="{{ __('inclusion') }}">Inclusion</label>
                                <textarea class="form-control" id="inclusion" name="inclusion" required>{{$service->inclusion}}"</textarea>
                                @error('inclusion') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exclusion" value="{{ __('exclusion') }}">Exclusion</label>
                                <textarea class="form-control" id="exclusion" name="exclusion" required>{{$service->exclusion}}</textarea>
                                @error('exclusion') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="location" value="{{ __('location') }}">location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{$service->location}}">
                                    @error('location') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>File upload</label>
                                    <input type="file" class="form-control" id="image" name="image" required value="{{$service->image}}">
                                    @error('image') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <button class="btn btn-light">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('content');
    CKEDITOR.replace('inclusion');
    CKEDITOR.replace('exclusion');
</script>
@endsection