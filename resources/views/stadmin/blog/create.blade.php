@extends('layouts.staradmin')
@section('title','Create Blog')
@section('content')

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form action="{{ route('serviceProviderBlog.StoreBlog') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="title" value="{{ __('title') }}">Title *</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                @error('title') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="blog_category" value="{{ __('blog_category') }}">Blog Category</label>
                                <select class="form-control" id="blog_category" name="blog_category">
                                    <option value="">-- select blog category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('blog_category') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="sub_category" value="{{ __('sub_category') }}">Sub Category</label>
                                <select class="form-control" id="sub_category" name="sub_category">
                                    <option value="">-- select sub category --</option>
                                    @foreach($subcategory as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="content" value="{{ __('content') }}">Content</label>
                                <textarea class="form-control" id="content" name="content" required></textarea>
                                @error('content') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image" value="{{ __('image') }}">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                                @error('image') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="thumbnail" value="{{ __('thumbnail') }}">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                                @error('thumbnail') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">
                                <span class="text">Create Blog</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('content');
</script>


@endsection
