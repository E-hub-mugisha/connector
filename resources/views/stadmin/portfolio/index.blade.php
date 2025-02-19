@extends('layouts.staradmin')
@section('title', 'Services Portfolio')
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
                            <button class="btn btn-primary btn-sm text-white mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#portfolioModal"><i class="mdi mdi-account-plus"></i>Add new portfolio</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th>Service Name</th>
                                    <th>tags</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $portfolio)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('image/portfolios') }}/{{$portfolio->image}}" alt="" />
                                    </td>
                                    <td><a href="#">{{$portfolio->service->name}}</a></td>
                                    <td>{{$portfolio->tag}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('sprovider.ShowPortfolio', $portfolio->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <form id="delete-form" action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this partner?')">
                                                <i class="mdi mdi-delete"> </i></button>
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
        <!-- Modal -->
        <div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@yield('title')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/createPortfolioService" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="service name" value="{{ __('service name') }}">service name</label>
                                    <select class="form-control" name="service_id" id="service_id">
                                        @foreach( $services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tag" value="{{ __('tag') }}">tag</label>
                                    <input type="text" class="form-control" id="tag" name="tag">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label>File upload</label>
                                        <input type="file" name="image" id="image" multiple class="form-control">
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