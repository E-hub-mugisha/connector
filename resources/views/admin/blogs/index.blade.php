@extends('layouts.app')
@section('title','Blog')
@section('content')

<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title') </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('image/blog')}}/{{$blog->image}}" alt="{{$blog->title}}" width="50" height="50">
                                </a>
                            </td>
                            <td><a href="{{route('admin.blog_detail', $blog->slug)}}">{{ Str::limit($blog->title, 50) }}</a></td>
                            <td>{{$blog->blog_category}}</td>
                            <td>{{$blog->created_at}}</td>
                            <td class="action-col">
                                <a class="btn btn-info btn-circle" href="{{route('admin.blog_detail',$blog->slug)}}">view</a>
                                <a class="btn btn-info btn-circle" href="{{route('admin.edit_blog',$blog->id)}}">Edit</a>
                                <form id="delete-form" action="{{route('admin.blog_delete', $blog->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure you want to delete this blog?')">

                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection