<div>
    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Your Order is <span style="color: #a8729a;">{{$porder->status}}</span>!</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                            </div>
                            @foreach($porder->orderItems as $items)
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-fluid" alt="Phone">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0">{{$items->product->name}}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">White</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Price: {{$items->price}}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Qty: {{$items->quantity}}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">${{$items->price * $items->quantity}}</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-2">
                                            <p class="text-muted mb-0 small">Track Order</p>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                                <div class="progress-bar" role="progressbar" style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-around mb-1">
                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-between pt-2">
                                <h3 class="fw-bold mb-0">Bill Details</h3>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-muted mb-0">Invoice Number : {{$porder->id}}</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Names : {{$porder->names}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Email : {{$porder->email}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Phone : {{$porder->phone}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Location : {{$porder->location}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Order Note : {{$porder->notes}}</p>
                            </div>
                            <div class="d-flex justify-content-between pt-2">
                                <h3 class="text-center fw-bold mb-0">Transaction Details</h3>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Transaction Date : {{$porder->created_at}}</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4"></span></p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Status : {{$porder->status}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Payment Mode : {{$porder->payment_mode}}</p>
                            </div>
                        </div>
                        <div class="card-footer border-0 px-4 py-5" style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

                            <span class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">SubTotal: <span class="h4 mb-0 ms-2">${{$porder->subtotal}}</span></span>
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                paid: <span class="h2 mb-0 ms-2">${{$porder->total}}</span></h5>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">

                            <a href="{{route('customer.dashboard')}}" type="button" class="btn btn-primary px-3"><i class="fas fa-reply" aria-hidden="true"></i>Back</a>
                            <a onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="deliveredOrder({{$porder->id}})" type="button" class="btn btn-success px-3"><i class="far fa-thumbs-up" aria-hidden="true"></i>Accept</a>
                            <a onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder({{$porder->id}})" type="button" class="btn btn-danger px-3"><i class="fas fa-bolt" aria-hidden="true"></i>Cancel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>