@extends('layouts.staradmin')
@section('title', 'Providers Blogs')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                
                <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash">@yield('title')</h4>
                    </div>
                    <div>
                        <a href="{{route('serviceProviderBlog.CreateBlog')}}" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add blog</a>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $blogs as $blog )
                                <tr>
                                    <td>
                                        {{ Str::limit($blog->title, 50) }}
                                    </td>
                                    <td>
                                        {{ $blog->blog_category}}
                                    </td>
                                    <td>
                                        <label class="badge badge-danger">Pending</label>
                                    </td>
                                    <td>
                                        {{ $blog->created_at}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm" href="{{ route('serviceProviderBlog.blogDetail', $blog->slug )}}">
                                            <span class="badge badge-success">Read</span>
                                        </a>
                                        <form id="delete-form" action="{{ route('serviceProviderBlog.blogDelete', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <span class="badge badge-danger">Delete</span>
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
    </div>
</div>
<!-- content-wrapper ends -->

@endsection