<div>
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <header class="dashboard-header">
                <div class="d-flex align-items-center justify-content-end">
                    <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                        <span></span>
                    </button>
                    <form action="#" class="search-form">
                        <input type="text" placeholder="Search here..">
                        <button><img src="../images/lazy.svg" data-src="images/icon/icon_10.svg" alt="" class="lazy-img m-auto"></button>
                    </form>
                    <div class="profile-notification ms-2 ms-md-5 me-4">
                        <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="../images/lazy.svg" data-src="images/icon/icon_11.svg" alt="" class="lazy-img">
                            <div class="badge-pill"></div>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                            <li>
                                <h4>Notification</h4>
                                <ul class="style-none notify-list">
                                    <li class="d-flex align-items-center unread">
                                        <img src="../images/lazy.svg" data-src="images/icon/icon_36.svg" alt="" class="lazy-img icon">
                                        <div class="flex-fill ps-2">
                                            <h6>You have 3 new mails</h6>
                                            <span class="time">3 hours ago</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="../images/lazy.svg" data-src="images/icon/icon_37.svg" alt="" class="lazy-img icon">
                                        <div class="flex-fill ps-2">
                                            <h6>Your job post has been approved</h6>
                                            <span class="time">1 day ago</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center unread">
                                        <img src="../images/lazy.svg" data-src="images/icon/icon_38.svg" alt="" class="lazy-img icon">
                                        <div class="flex-fill ps-2">
                                            <h6>Your meeting is cancelled</h6>
                                            <span class="time">3 days ago</span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div><a href="{{route('sprovider.add_service')}}" class="job-post-btn tran3s">Post a Service</a></div>
                </div>
            </header>
            <!-- End Header -->

            <!-- <h2 class="main-title">Dashboard</h2> -->
            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-6 align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Sales</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalSales}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Revenue</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{$totalRevenue}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pending Requests Card Example -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPending}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-4">

                    <div class="bg-white card-box border-20">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="a1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table job-alert-table">
                                        <thead>
                                            <tr>
                                                <th>Email & Name</th>
                                                <th>Price</th>
                                                <th>Phone</th>
                                                <th>Date & Time</th>
                                                <th>Status</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    <div class="job-name fw-500">{{$order->names}}</div>
                                                    <div class="info1">{{$order->email}}</div>
                                                </td>
                                                <td class="price-col">{{$order->total}}</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4">

                    <div class="bg-white card-box border-20">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="a1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table job-alert-table">
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
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="icon-list-alt"></i>Select Options
                                                        </button>

                                                        <div class="dropdown-menu tx-13" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{route('sprovider.edit_service',['service_slug'=>$service->slug])}}">Edit</a>
                                                            <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$service->id}})">Delete</a>
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
            </div>
        </div>
    </div>
</div>