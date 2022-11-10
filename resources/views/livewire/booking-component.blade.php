<div>
    <link href="{{asset('assets/booking/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/booking/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
    <!-- <link href="{{asset('assets/booking/css/bootstrap.min.css')}}" rel="stylesheet" /> -->
    <script src="{{asset('assets/booking/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <!-- <script src="{{asset('assets/booking/js/bootstrap.min.js')}}" type="text/javascript"></script> -->
    <script src="{{asset('assets/booking/js/gsdk-bootstrap-wizard.js')}}" type="text/javascript"></script>
    <link href="{{asset('assets/booking/css/demo.css')}}" rel="stylesheet" />

    <div class="page-content">
        <div class="checkout">
            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-sm-9 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="red" id="wizard">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form action="/bookNow" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="wizard-header">
                                        <h3>Your Booking info</h3>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="details">
                                            <div class="row d-flex justify-content-center align-items-center h-100">
                                                <div class="card card-stepper">
                                                    <div class="card-header p-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-muted mb-2"> Service ID: <span class="fw-bold text-body">{{$service->id}}</span></p>
                                                                <p class="text-muted mb-2"> Service Name: <span class="fw-bold text-body">{{$service->name}}</span></p>
                                                                <p class="text-muted mb-0"> Service Category <span class="fw-bold text-body">{{$service->category->name}}</span> </p>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0"> <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}">View Details</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="text-muted mb-2"> Service Provider Name: <span class="fw-bold text-body">{{$service->provider->sprovider_name}}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="d-flex flex-row mb-4 pb-2">
                                                            <div class="flex-fill">

                                                                
                                                                <input hidden type="text" class="form-control" id="service_id" name="service_id" value="{{$service->id}}" required>
                                                                <input hidden type="text" class="form-control" id="service_provider_id" name="service_provider_id" value="{{$service->service_provider_id}}" required>
                                                                @error('service_id') <p class="text-danger">{{$message}}</p>@enderror
                                                                
                                                                @php
                                                                $total = $service->price;
                                                                @endphp
                                                                @if($service->discount)
                                                                @if($service->discount_type == 'fixed')

                                                                @php $total = $total-$service->discount; @endphp

                                                                @elseif($service->discount_type == 'percent')

                                                                @php $total = $total-($total*$service->discount/100); @endphp

                                                                @endif
                                                                @endif
                                                                <p class="text-muted"> Discount: {{$service->discount}}</p>
                                                                <input hidden type="text" class="form-control" id="total" name="total" value="{{$total}}" required>
                                                                @error('total') <p class="text-danger">{{$message}}</p>@enderror</label>
                                                                <h4 class="mb-3"><span class="small text-muted"> Amount: </span> {{$total}} </h4>
                                                                <!-- <p class="text-muted">Tracking Status on: <span class="text-body">11:30pm, Today</span></p> -->
                                                            </div>
                                                            <div>
                                                                <img class="align-self-center img-fluid" src="{{asset('assets/images/products')}}/{{$service->image}}" width="250">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#captain" type='button' class='pull-right btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' data-toggle="tab">Next</a>
                                            <!-- <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' /> -->
                                        </div>
                                        <div class="tab-pane" id="captain">
                                            <h4 class="info-text">Fill in the details </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Names *</label>
                                                    <input type="text" class="form-control" id="names"  name="names" required>
                                                    @error('names') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email *</label>
                                                    <input type="text" class="form-control" id="email"  name="email">
                                                    @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Phone *</label>
                                                    <input type="tel" class="form-control" id="phone"  name="phone" required>
                                                    @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                                </div><!-- End .col-md-6 -->
                                                <div class="col-md-6">
                                                    <label>Street address *</label>
                                                    <input type="text" class="form-control" id="location"  name="location" placeholder="House number and Street name" required>
                                                    @error('location') <p class="text-danger">{{$message}}</p>@enderror

                                                </div><!-- End .col-md-6 -->
                                            </div>
                                            <a href="#tab3" type='button' class='pull-right btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' data-toggle="tab">Next</a>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="payment" class="col" value="{{ __('payment') }}">Select payment mode</label>
                                                    <select class="col form-control" id="payment_mode"  name="payment_mode">
                                                        <option value="">Select Payment Mode</option>
                                                        <option value="check-payment">Check payments</option>
                                                        <option value="Cash-on-delivery">Cash on delivery</option>
                                                        <option value="bank-transfer">Bank transfer</option>
                                                    </select>
                                                    @error('payment_mode') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Date *</label>
                                                    <input type="date" class="form-control" id="date"  name="date" required>
                                                    @error('date') <p class="text-danger">{{$message}}</p>@enderror
                                                </div><!-- End .col-md-6 -->
                                                <div class="col-md-4">
                                                    <label>Time *</label>
                                                    <input type="time" class="form-control" id="time"  name="time" required>
                                                    @error('time') <p class="text-danger">{{$message}}</p>@enderror

                                                </div><!-- End .col-md-6 -->


                                            </div><!-- End .row -->

                                            <label>Order notes (optional)</label>
                                            <textarea class="form-control" cols="10" rows="4" id="notes"  name="notes" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                            @error('notes') <p class="text-danger">{{$message}}</p>@enderror


                                            <button type="submit" class="pull-right btn btn-outline-primary-2">
                                                <span>Book Service Now</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                        </div><!-- End .summary -->
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- End .row -->

    </div><!-- End .container -->
</div><!-- End .checkout -->
</div><!-- End .page-content -->
</div>