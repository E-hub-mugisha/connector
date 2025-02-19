@extends('layouts.guest')
@section('title', 'Dashboard')
@section('content')


        <div class="container">
            <h1 class="main-title">Welcome back, {{ $user->name }}! Ready to connect with top experts today?</h1>

            <!-- User Profile Section -->
            <div class="card bg-white card-box border-20 mb-4">
                <h3 class="dash-title-three">Your Profile</h3>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
                    <p><strong>Address:</strong> {{ $user->address ?? 'Not Provided' }}</p>
                    <a href="{{ route('CustomerProfile.edit')}}" class="dash-btn-two tran3s me-3">Edit Profile</a>
                </div>
            </div>

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