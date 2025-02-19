@extends('layouts.staradmin')
@section('title', 'Client Details')
@section('content')


<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">{{ $clients->name}}'s Detail</h4>
                                                        <h5 class="card-subtitle card-subtitle-dash">Email: {{$clients->email}}</h5>
                                                        <h5 class="card-subtitle card-subtitle-dash">Phone: {{$clients->phone}}</h5>
                                                        <h5 class="card-subtitle card-subtitle-dash">Location: {{$clients->location}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Service Bookings by Status</h4>
                                                        <div class="chart-wrapper pb-4">
                                                            <canvas id="bookingsChart" width="200" height="200"></canvas>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Total service Requests</h4>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>View All</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Service</th>
                                                                <th>Names</th>
                                                                <th>Address</th>
                                                                <th>When</th>
                                                                <th>Status</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $order)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{route('serviceProviderBooking.show',['id'=>$order->id])}}">
                                                                        <h6>{{ $order->service->name }}</h6>
                                                                       
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>{{$order->names}}</h6>
                                                                    <p>{{$order->email}}</p>
                                                                </td>
                                                                <td>
                                                                    <h6>{{$order->phone}}</h6>
                                                                    <p>{{$order->location}}</p>
                                                                </td>
                                                                <td>
                                                                    <h6>{{$order->date}}</h6>
                                                                    <p>{{$order->time}}</p>
                                                                </td>
                                                                <td>
                                                                    @if($order->status == 'completed')
                                                                    <div class="badge badge-opacity-success">{{$order->status}}</div>
                                                                    @elseif($order->status == "pending")
                                                                    <div class="badge badge-opacity-warning">{{$order->status}}</div>
                                                                    @elseif($order->status == "approved")
                                                                    <div class="badge badge-opacity-primary">{{$order->status}}</div>
                                                                    @elseif($order->status == "decline")
                                                                    <div class="badge badge-opacity-danger">{{$order->status}}</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a class="btn badge badge-opacity-success btn-sm" href="{{ route('serviceProviderBooking.show', $order->id) }}">
                                                                        <i class="fas fa-folder">
                                                                        </i>
                                                                        View
                                                                    </a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection