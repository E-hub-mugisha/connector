@extends('layouts.staradmin')
@section('title', 'Edit account')
@section('content')
<div class="content-wrapper">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card container mb-3" style="border-radius: .5rem;">

                <h2 class="main-title mt-3">Edit Account</h2>

                <div class="bg-white card-box border-20">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('ServiceProvider.updateProfile',$sprovider->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row ">
                            <div class="col-md-10 dash-input-wrapper mb-30 form-group">
                                <div class="col-md-3 dash-btn-one d-inline-block position-relative me-3">
                                    @if($sprovider->image)
                                    <img src="{{asset('image/profile')}}/{{$sprovider->image}}" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    @else
                                    <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    @endif
                                </div>
                                <div class="col-md-3 dash-btn-one d-inline-block position-relative me-3">
                                    <i class="bi bi-plus"></i>
                                    Upload Profile
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="about" class="control-label">About: </label>
                            <textarea class="form-control" id="about" name="about" required>{{$sprovider->about}}</textarea>
                            @error('about')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="skills" class="control-label">skills: </label>
                            <textarea class="form-control" id="skills" name="skills" required>{{$sprovider->skills}}</textarea>
                            @error('skills')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="qualification" class="control-label">qualification: </label>
                            <textarea class="form-control" id="qualification" name="qualification" required>{{$sprovider->qualification}}</textarea>
                            @error('qualification')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" dash-input-wrapper mb-30 form-group">
                            <label for="experience" class="control-label">experience: </label>
                            <textarea class="form-control" id="experience" name="experience" required>{{$sprovider->experience}}</textarea>
                            @error('experience')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="city" class="control-label">city: </label>
                                <input type="text" class="form-control" name="city" value="{{$sprovider->city}}" required>
                                @error('city')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="service_category_id" class="control-label">Service Category: </label>

                                <select name="service_category_id" class="nice-select form-control" wire:model="service_category_id" required>
                                    @if($sprovider->service_category_id)
                                    <option value="{{$sprovider->category}}">{{$sprovider->category->name}}</option>
                                    @endif
                                    @foreach ($scategories as $scategory)
                                    <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                                <label for="service_location" class="control-label">Service Locations</label>

                                <input type="text" class="form-control" name="service_locations" value="{{$sprovider->service_locations}}" required>
                                @error('service_locations')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('about');
    CKEDITOR.replace('skills');
    CKEDITOR.replace('qualification');
    CKEDITOR.replace('experience');
</script>
@endsection