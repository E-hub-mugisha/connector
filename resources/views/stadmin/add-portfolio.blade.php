@extends('layouts.staradmin')
@section('title', 'add Portfolio')
@section('content')

<div class="content-wrapper">
    <form action="/createPortfolioService" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@yield('title')</h4>
                        <p class="card-description">
                            Fill in the information to @yield('title')
                        </p>
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
                            <div class="form-group col-md-6">
                                <label>File upload</label>
                                <input type="file" name="image" id="image" multiple class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection