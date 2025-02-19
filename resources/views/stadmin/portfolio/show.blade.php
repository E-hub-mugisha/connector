@extends('layouts.staradmin')
@section('title', 'Show Portfolio')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">@yield('title')</h4>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                                <i class="mdi mdi-account-plus"></i>Update portfolio
                            </button>
                            <form id="delete-form" action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this partner?')">
                                    <i class="mdi mdi-delete"> </i>Delete Portfolio
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Service Name:{{$portfolio->service->name}}</h4>
                            <h5 class="card-subtitle card-subtitle-dash">Service tag: {{$portfolio->tag}}</h5>
                            <img src="{{ asset('image/portfolios') }}/{{$portfolio->image}}" alt="" class="image-fluid" width="100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portfolios.update',$portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method( 'PUT' )
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="service name" value="{{ __('service name') }}">service name</label>
                            <select class="form-control" name="service_id" id="service_id">
                                <option value="{{$portfolio->service_id}}" selected>{{$portfolio->service->name}}</option>
                                @foreach( $services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag" value="{{ __('tag') }}">tag</label>
                            <input type="text" class="form-control" id="tag" name="tag" value="{{$portfolio->tag}}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>File upload</label>
                                <input type="file" name="image" id="image" multiple class="form-control">
                                <img src="{{$portfolio->image}}" alt="" class="image-fluid" width="100" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection