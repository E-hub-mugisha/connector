@extends('layouts.app')
@section('title','SUbCategory')
@section('content')

<div class="container">
  <button type="button" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#CategoryModal">
    Add Category
  </button>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>

    </div>
    <!-- add category Modal-->
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          @if(Session::has('message'))
          <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
          @endif
          <form action="{{ route('admin.add_Subcategory')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

              <div class="form-group">
                <label for="name" value="{{ __('Category name') }}">SubCategory name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name') <p class="text-danger">{{$message}}</p>@enderror
              </div><!-- End .form-group -->

              <div class="form-group">
                <label for="subcategory" value="{{ __('SubCategory') }}">subcategory</label>
                <select class="form-control" name="service_category_id" id="service_category_id">
                  
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div><!-- End .form-group -->

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">
                Add Category
              </button>
            </div>
          </form>
        </div>
      </div>
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
              <th>sub category name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Sub category name</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($scategories as $scategory)
            <tr>
              <td>{{$scategory->id}}</td>
              <td>
                <a href="#">{{$scategory->name}}</a>
              </td>
              <td class="action-col">
                <a href="#" class="btn btn-sm btn-info">
                  <span class="badge-info">Edit</span>
                </a>
                <form id="delete-form" action="{{route('admin.delete_sub_category',$scategory->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">

                    <span class="badge-danger">Delete</span>
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
  <!-- DataTales Example -->
</div>
@endsection