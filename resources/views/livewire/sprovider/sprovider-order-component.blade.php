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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Bookings</h6>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card-body">
                    <table class="table table-responsive table-wishlist table-mobile">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>provider name</th>
                                <th>Price</th>
                                <th>Email</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>Date & time</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td class="product-col">
                                    {{ $order->service_provider_id}}
                                </td>
                                <td class="price-col">{{$order->total}}</td>
                                <td class="stock-col">{{$order->email}}</td>
                                <td class="stock-col">
                                    <span class="in-stock">{{$order->names}}</span>
                                </td>
                                <td class="price-col">{{$order->phone}}</td>
                                <td class="price-col">{{$order->date}} at {{$order->time}}</td>
                                <td class="stock-col">
                                    <span class="in-stock">{{$order->status}}</span>
                                </td>
                                <td class="action-col">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-list-alt"></i>Select Options
                                        </button>

                                        <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('sprovider.edit_order',['order_id'=>$order->id])}}">Detail</a>
                                            <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteOrder({{$order->id}})">Delete</a>
                                            <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="validateOrder({{$order->id}})">Approve</a>
                                            <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder({{$order->id}})">Cancel</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><!-- End .table table-wishlist -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </div>
    </div>
</div>