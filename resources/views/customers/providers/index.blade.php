@extends('layouts.guest')
@section('title', 'Service providers')
@section('content')

<div class="container">


    <!-- User providers Section -->
    <div class="card bg-white card-box border-20 mb-4">
        <h3 class="dash-title-three">@yield('title')</h3>
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Service location</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($providers as $provider)
                <tr>
                    <td class="py-1">
                <img src="{{asset('image/profile')}}/{{$provider->image}}" alt="image" height="50" width="50" />
            </td>
                    <td>{{ $provider->sprovider_name }}</td>
                    <td>{{ $provider->proEmail }}</td>
                    <td>{{ $provider->city }}</td>
                    <td>{{ $provider->service_locations}}</td>
                    <td>{{ $provider->category->name }}</td>
                    <td>{{ $provider->status }}</td>
                    <td>
                        <a href="{{ route('customer.ServiceProviderDetail', $provider->id) }}" class="btn btn-info btn-sm">View</a>
                        <!--<a href="#" class="btn btn-warning btn-sm">Edit</a>-->
                        <a href="{{ route('customer.ServiceProviderService', $provider->id) }}"
                            class="btn btn-info btn-sm">services</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection