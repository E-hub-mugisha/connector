@extends('layouts.staradmin')
@section('title', 'Working Hours')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">@yield('title')</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="{{ route('working_hours.create') }}" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Add Working Hours</a>
                        </div>
                    </div>
                </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table" id="dataTable">
                                                        <thead>
                                                            <tr>
            <th>Day</th>
            <th>Is Closed</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($workingHours as $workingHour)
        <tr>
            <td>{{ $workingHour->day }}</td>
            <td>{{ $workingHour->is_closed ? 'Yes' : 'No' }}</td>
            <td>{{ $workingHour->start_time }}</td>
            <td>{{ $workingHour->end_time }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('working_hours.edit', $workingHour->id) }}">Edit</a>
                <form action="{{ route('working_hours.destroy', $workingHour->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </thead>
        
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
