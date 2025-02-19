@extends('layouts.guest')
@section('title', 'Service booked')
@section('content')

<div class="container">
            

            <!-- User Bookings Section -->
            <div class="card bg-white card-box border-20 mb-4">
                <h3 class="dash-title-three">Your Bookings</h3>
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Service Provider</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Payment Mode</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->serviceProvider->sprovider_name }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>{{ $booking->total }}</td>
                            <td>{{ $booking->payment_mode }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time }}</td>
                            <td>{{ $booking->location }}</td>
                            <td>
                                <a href="{{ route('ServiceBookedDetail', $booking->id) }}" class="btn btn-info btn-sm">View</a>
                                <!--<a href="#" class="btn btn-warning btn-sm">Edit</a>-->
                                <form action="{{ route('customer.cancelBooking', $booking->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel Booking</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
@endsection