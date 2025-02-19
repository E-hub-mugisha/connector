<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <h2 class="main-title">Booking Details</h2>

            <div class="bg-white card-box border-20">

                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md 10">
                        <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                            <div class="card-body p-5">

                                <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Details</p>

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

                                        <div class="col-md-12 col-lg-12">
                                            <p class="mb-3">{{$serviceBookings->names}}</p>
                                            <p class="mb-3">{{$serviceBookings->phone}}</p>
                                            <p class="mb-3">{{$serviceBookings->email}}</p>
                                            <p class="mb-3">{{$serviceBookings->location}}</p>
                                        </div>
                                        <div class="col-md-12 col-lg-12">
                                            <p class="mb-3">{{$serviceBookings->notes}}</p>
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
        </div>
    </div>
</div>