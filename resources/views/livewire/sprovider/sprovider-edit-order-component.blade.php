<div>
    <style>
        .horizontal-timeline .items {
            border-top: 2px solid #ddd;
        }

        .horizontal-timeline .items .items-list {
            position: relative;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            background-color: #ddd;
            top: 0;
            margin-top: -5px;
        }

        .horizontal-timeline .items .items-list {
            padding-top: 15px;
        }
    </style>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md 10">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-5">

                            <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Reciept</p>

                            <div class="row">
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Date</p>
                                    <p>{{$serviceBookings->date}}</p>
                                </div>
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Order No.</p>
                                    <p>{{$serviceBookings->id}}</p>
                                </div>
                            </div>

                            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                <div class="row">
                                    
                                    <div class="col-md-8 col-lg-9">
                                        <p>{{$serviceBooked->service->name}}</p>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <p>{{$serviceBookings->total}}</p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                    <p class="lead fw-bold mb-0" style="color: #f37a27;">{{$serviceBookings->total}}</p>
                                </div>
                            </div>

                            <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="horizontal-timeline">

                                        <ul class="list-inline items d-flex justify-content-between">
                                            <li class="list-inline-item items-list">
                                                <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">{{$serviceBookings->status}}</p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                            </li>
                                        </ul>

                                    </div>

                                    <a href="{{route('sprovider.order')}}" class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Return Back</a class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                        

                                </div>
                            </div>

                            <p class="mt-4 pt-2 mb-0">Want any help? <a href="{{route('home.contact')}}" style="color: #f37a27;">Please contact
                                    us</a></p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>