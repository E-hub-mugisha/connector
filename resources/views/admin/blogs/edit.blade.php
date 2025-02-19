@extends('layouts.app')
@section('title','Edit Blog')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{ route('admin.blog_update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" value="{{ __('title') }}">title *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                            @error('title') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="blog_category" value="{{ __('blog_category') }}">blog category</label>
                            <select class="form-control" id="blog_category" name="blog_category">
                                <option value="{{ $blog->blog_category }}">{{ $blog->blog_category }}</option>
                                @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('blog_category') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        
                        <div class="form-group">
                            <label for="sub_category" value="{{ __('sub_category') }}">Sub category</label>
                            <select class="form-control" id="sub_category" name="sub_category">
                                <option value="{{ $blog->sub_category }}">{{ $blog->sub_category }}</option>
                                @foreach($subcategory as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('sub_category') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option value="{{ $blog->status }}">{{ $blog->status }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured">Featured</label>
                            <select class="form-form-select" name="featured" id="featured">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content" value="{{ __('content') }}">content</label>
                            <textarea class="form-control" id="content" name="content" required>{!! $blog->content !!}</textarea>
                            @error('content') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="{{ __('image') }}">image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror

                            <img src="{{asset('assets/images/blogs')}}/{{$blog->thumbnail}}" width="60" />

                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="{{ __('thumbnail') }}">thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                            @error('thumbnail') <p class="text-danger">{{$message}}</p>@enderror

                            <img src="{{asset('assets/images/blogs/thumbnails')}}/{{$blog->thumbnail}}" width="60" />

                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Blog</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'content' textarea
    CKEDITOR.replace('content');
</script>
</div>

@endsection