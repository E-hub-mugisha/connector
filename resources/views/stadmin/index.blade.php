@extends('layouts.staradmin')
@section('title', 'Clients')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

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
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Names</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Location</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($clients as $client)
                                                            <tr>
                                                                <td>
                                                                    <h6>{{$client->names}}</h6>
                                                                    </td>
                                                                    <td>
                                                                    <p>{{$client->email}}</p>
                                                                </td>
                                                                <td>
                                                                    <h6>{{$client->phone}}</h6>
                                                                    </td>
                                                                    <td>
                                                                    <p>{{$client->location}}</p>
                                                                </td>
                                                                <td>
                                                                    <a class="btn badge badge-opacity-success btn-sm" href="{{route('sprovider.clientDetails', $client->user_id )}}">
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
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection