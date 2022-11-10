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
            <h6 class="m-0 font-weight-bold text-primary">{{$category_name}} Service  </h6>
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
                            <th>Image</th>
                            <th>Service</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
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
                                </figure>
                            </td>
                            <td>
                                <a href="#">{{$service->name}}</a>

                            </td>
                            <td>{{$service->category->name}}</td>
                            <td>{{$service->price}}</td>
                            <td class="stock-col">
                                <span class="in-stock">
                                    @if($service->status)
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                </span>
                            </td>
                            <td>{{$service->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->
                {{$services->links()}}
            </div>
        </div>
    </div>
</div>