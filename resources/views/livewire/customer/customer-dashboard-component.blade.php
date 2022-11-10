<div>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>{{ auth()->user()->name }}</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-3 col-lg-2">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-porders-link" data-toggle="tab" href="#tab-porders" role="tab" aria-controls="tab-porders" aria-selected="false">Product orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-profile-link" data-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Profile</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li> -->
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-9 col-lg-10">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                    <p>Hello <span class="font-weight-normal text-dark">User</span>
                                        <br>
                                        From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.
                                    </p>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

                                    <div class="page-content">
                                        <div class="container">
                                            <table class="table table-wishlist table-mobile">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>service</th>
                                                        <th>total</th>
                                                        <th>Status</th>
                                                        <th>payment mode</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($serviceBookings as $booking)
                                                    <tr>
                                                        <td>{{$booking->id}}</td>
                                                        <td class="product-col">
                                                            <div class="product">

                                                                <h3 class="product-title">
                                                                    <a href="#">{{$booking->total}}</a>
                                                                </h3><!-- End .product-title -->
                                                            </div><!-- End .product -->
                                                        </td>
                                                        <td class="price-col">${{$booking->total}}</td>
                                                        <td class="stock-col"><span class="in-stock">{{$booking->status}}</span></td>
                                                        <td class="pay-col">{{$booking->payment_mode}}</td>
                                                        <td class="action-col">
                                                            <div class="dropdown">
                                                                <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="icon-list-alt"></i>Select Options
                                                                </button>

                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{route('customer.booking_detail',['booking_id'=>$booking->id])}}">details</a>
                                                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="deliveredOrder({{$booking->id}})">Service Delivered</a>
                                                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder({{$booking->id}})">Cancel service</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table><!-- End .table table-wishlist -->
                                        </div><!-- End .container -->
                                    </div><!-- End .page-content -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-porders" role="tabpanel" aria-labelledby="tab-porders-link">
                                    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>total</th>
                                                <th>names</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>location</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productOrders as $porder)
                                            <tr>
                                                <td>{{$porder->id}}</td>
                                                <td>
                                                    {{$porder->total}}
                                                </td>
                                                <td>{{ $porder->names }}</td>
                                                <td>{{$porder->email}}</td>
                                                <td>
                                                    {{$porder->phone}}
                                                </td>
                                                <td>
                                                    {{$porder->location}}
                                                </td>
                                                <td>
                                                    @if($porder->status == 'Delivered')
                                                    <span class="text-success">{{$porder->status}}</span>
                                                    @elseif($porder->status == 'cancelled')
                                                    <span class="text-danger">{{$porder->status}}</span>
                                                    @elseif($porder->status == 'ordered')
                                                    <span class="text-primary">{{$porder->status}}</span>
                                                    @endif
                                                </td>
                                                <td class="action-col">
                                                    <a class="btn btn-primary" href="{{route('customer.porder_detail',['porder_id'=>$porder->id])}} ">Detail</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile-link">
                                    <p>The following addresses will be used on the checkout page by default.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Account profile</h3><!-- End .card-title -->

                                                    <p>User Name:<span>{{Auth::user()->name}}</span></p>
                                                    <p>Location:<span>{{Auth::user()->location}}</span></p>
                                                    <p>Phone:<span>{{Auth::user()->phone}}</span></p>
                                                    <p>Email:<span>{{Auth::user()->email}}</span></p>
                                                    <p><a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                    <p>You have not set up this type of address yet.<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Display Name *</label>
                                        <input type="text" class="form-control" required>
                                        <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" required>

                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</div>