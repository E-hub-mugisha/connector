<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">service offerings</h6>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offerings as $serv)
                            <tr>
                                <td>{{$serv->id}}</td>
                                <td>
                                    <a href="#">
                                        <img src="{{asset('assets/images/products/thumbnails')}}/{{$serv->thumbnail}}" alt="Product image" height="50" width="60">
                                    </a>
                                </td>
                                <td>{{$serv->name}}</td>
                                <td>{{$serv->category->name}}</td>
                                <td>{{$serv->price}}</td>
                                <td>
                                    @if($serv->status)
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                </td>
                                <td>
                                    @if($serv->featured)
                                    Yes
                                    @else
                                    No
                                    @endif
                                </td>
                                <td class="action-col">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-list-alt"></i>Select Options
                                        </button>

                                        <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('sprovider.edit_service',['service_slug'=>$serv->slug])}}">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$serv->id}})">Delete</a>
                                            <a class="dropdown-item" href="#">The best option</a>
                                        </div>
                                    </div>
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