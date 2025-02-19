@extends('layouts.staradmin')
@section('title','Blog Detail')
@section('content')

<div class="content-wrapper">
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <a href="#">
                    <img src="{{asset('image/blog')}}/{{$blog->image}}" alt="{{$blog->title}}" width="100%">
                </a>
                <div class="entry-meta">
                    <span class="entry-author">
                        by <a href="#">HileTasker</a>
                    </span><br />
                    <span class="meta-separator">|</span>
                    <a href="#">{{$blog->created_at}}</a>
                    <span class="meta-separator">|</span>
                    <a href="#">2 Comments</a>
                </div><!-- End .entry-meta -->

                <h4 class="entry-title">
                    <a href="#">{{ Str::limit($blog->title, 50) }}</a>
                </h4><!-- End .entry-title -->

                <div class="entry-cats">
                    in <a href="#">{{$blog->blog_category}}</a>
                </div><!-- End .entry-cats -->

                <div class="entry-content">
                    <p>{{ $blog->content}}</p>
                </div><!-- End .entry-content -->
                <div class="form-footer">
                    <a href="{{route('serviceProviderBlog.editBlog', $blog->id)}}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Edit blog</span>
                    </a>
                </div><!-- End .form-footer -->
            </div>
        </div>
    </div>
</div>

@endsection