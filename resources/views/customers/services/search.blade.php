@extends('layouts.guest')
@section('title', 'Result Services')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Services Search Result</h4>
                        </div>
                        <!--<div>-->
                        <!--    <a href="#" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add Service</a>-->
                        <!--</div>-->
                    </div>
                    <div class="table-responsive">
                        @if(isset($services) && $services->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th>Service Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{asset('image/services')}}/{{$service->image}}" alt="{{$service->name}}" heigh="50" width="50"  />
                                    </td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->category->name}}</td>
                                    <td class="text-danger"> {{$service->price}}</td>
                                    <td>
                                        @if($service->status)
                                        <label class="bg bg-success">Active</label>
                                        @else
                                        <label class="bg bg-danger">Inactive</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('CustomerService.show', $service->slug) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View Service
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif(isset($services))
        <p>No services found.</p>
        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection