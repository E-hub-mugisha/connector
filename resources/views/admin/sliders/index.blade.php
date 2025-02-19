@extends('layouts.app')
@section('title','Sliders')
@section('content')

<div class="container">
    <button type="button" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#SliderModal">
        Add Slider
    </button>
    <!-- add Slider Modal-->
    <div class="modal fade" id="SliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('admin.add_slider')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" value="{{ __('slider title') }}">slider title *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            @error('title') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="status" value="{{ __('status') }}">status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="{{ __('slider image') }}">slider image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror

                        </div><!-- End .form-group -->

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Add Slider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sliders</h6>
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
                            <th>image</th>
                            <th>Slider name</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('image/slider')}}/{{$slider->image}}" alt="{{$slider->title}}" height="50" width="60">
                                </a>
                            </td>
                            <td>
                                <a href="#">{{$slider->title}}</a>
                            </td>
                            <td>
                                @if($slider->status)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>{{$slider->created_at}}</td>
                            <td class="action-col">
                                <a href="{{route('admin.edit_slider', $slider->id)}}"><span class="btn btn-sm badge-info">Edit</span></a>
                                <form id="delete-form" action="{{route('admin.delete_slider',$slider->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this slider?')">

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
</div>

@endsection