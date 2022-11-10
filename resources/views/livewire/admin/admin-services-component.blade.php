<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Services </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
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
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('assets/images/products/thumbnails')}}/{{$service->thumbnail}}" alt="Product image" height="50" width="60">
                                </a>
                            </td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->category->name}}</td>
                            <td>{{$service->price}}</td>
                            <td>
                                @if($service->status)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>
                                @if($service->featured)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.edit_service',['service_slug'=>$service->slug])}}">Edit</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$service->id}})">Delete</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$services->links()}}
            </div>
        </div>
    </div>
</div>