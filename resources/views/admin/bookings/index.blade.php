@extends('layouts.app')
@section('title','Service booking')
@section('content')

<div class="container">

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
                            <th>name</th>
                            <th>phone</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Date & time</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td class="stock-col">
                                <span class="in-stock">{{$booking->names}}</span>
                            </td>
                            <td class="price-col">{{$booking->phone}}</td>
                            <td class="stock-col">
                                <span class="in-stock">{{$booking->status}}</span>
                            </td>
                            <td class="price-col">{{$booking->total}}</td>
                            
                            
                            <td class="price-col">{{$booking->date}} at {{$booking->time}}</td>
                            
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.show_booking', $booking->id)}}">view</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
            </div>
        </div><!-- End .page-content -->
    </div>
</div>

@endsection