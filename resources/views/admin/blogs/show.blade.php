@extends('layouts.app')
@section('title','Blog Detail')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
                <a href="#">
                    <img src="{{asset('image/blog')}}/{{$blog->image}}" alt="{{$blog->title}}" width="100%">
                </a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="entry-meta">
                    <span class="entry-author">
                        by <a href="#">{{ $blog->author->name }}</a>
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
                    <p>{!! $blog->content !!}</p>
                </div><!-- End .entry-content -->
                <div class="form-footer">
                    <div>
                    <a href="{{route('admin.edit_blog', $blog->id)}}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Edit blog</span>
                    </a>
                    </div>
                    <div>
                    <form id="approve-form" action="{{ route('admin.blogApprove', $blog->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-rounded btn-fw" onclick="return confirm('Are you sure you want to approve this blog?')">
                                    Approve</button>
                            </form>
                            </div>
                </div><!-- End .form-footer -->
            </div>
        </div>
    </div>
</div>

@endsection