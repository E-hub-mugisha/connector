@extends('layouts.app')
@section('title','Partners')
@section('content')

<div class="container">
    <button type="button" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#PartnerModal">
        Add Partner
    </button>
    <!-- add Partner Modal-->
    <div class="modal fade" id="PartnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('admin.add_partner')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" value="{{ __('Partner name') }}">Partner name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="{{ __('Partner image') }}">Partner image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image') <p class="text-danger">{{$message}}</p>@enderror

                        </div><!-- End .form-group -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Add Partner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

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
                            <th>partner name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                        <tr>
                            <td>{{$partner->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('image/partner')}}/{{$partner->image}}" alt="{{$partner->name}}" height="50" width="60">
                                </a>
                            </td>
                            <td>
                                <a href="#">{{$partner->name}}</a>
                            </td>
                            <td>{{$partner->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <form id="delete-form" action="{{route('admin.delete_partner', $partner->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure you want to delete this partner?')">

                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
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