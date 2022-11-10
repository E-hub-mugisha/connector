<div>
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active">Edit order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.order')}}">All order</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form wire:submit.prevent="updateOrder">
                                @csrf
                                <div class="form-group">
                                    <label>service name</label>
                                    <input type="text" class="form-control" id="service_name" name="service_name" wire:model="service_name" required>
                                    @error('service_name') <p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <input type="text" class="form-control" id="service_id" name="service_id" wire:model="service_id" required>
                                @error('service_id') <p class="text-danger">{{$message}}</p>@enderror

                                <label>service category name</label>
                                <input type="text" class="form-control" id="service_category" name="service_category" wire:model="service_category" required>
                                @error('service_category') <p class="text-danger">{{$message}}</p>@enderror


                                <label>service_provider</label>
                                <input type="text" class="form-control" id="service_provider" name="service_provider" wire:model="service_provider" required>
                                @error('service_provider') <p class="text-danger">{{$message}}</p>@enderror</label>



                                <h2 class="checkout-title">Fill in Details</h2><!-- End .checkout-title -->
                                <label>Names *</label>
                                <input type="text" class="form-control" id="name" name="name" wire:model="name" required>
                                @error('name') <p class="text-danger">{{$message}}</p>@enderror

                                <label>Email *</label>
                                <input type="text" class="form-control" id="email" name="email" wire:model="email">
                                @error('email') <p class="text-danger">{{$message}}</p>@enderror

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" wire:model="phone" required>
                                        @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6">
                                        <label>Street address *</label>
                                        <input type="text" class="form-control" id="location" name="location" wire:model="location" placeholder="House number and Street name" required>
                                        @error('location') <p class="text-danger">{{$message}}</p>@enderror

                                    </div><!-- End .col-sm-6 -->

                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Date *</label>
                                        <input type="date" class="form-control" id="date" name="date" wire:model="date" required>
                                        @error('b_date') <p class="text-danger">{{$message}}</p>@enderror
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6">
                                        <label>Time *</label>
                                        <input type="time" class="form-control" id="time" name="time" wire:model="time" required>
                                        @error('b_time') <p class="text-danger">{{$message}}</p>@enderror

                                    </div><!-- End .col-sm-6 -->

                                </div><!-- End .row -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" id="description" name="description" wire:model="description" placeholder="Notes about your booking, e.g. special notes for service"></textarea>
                                @error('description') <p class="text-danger">{{$message}}</p>@enderror


                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="row">
                                            <label for="payment" class="col" value="{{ __('payment') }}">Payment mode</label>
                                            <input class="col form-control" id="payment_mode" name="payment_mode" wire:model="payment_mode">
                                            @error('payment_mode') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->




                                <label for="discount" class="col" value="{{ __('discount') }}">discount</label>
                                <input type="text" class="form-control" id="discount" name="discount" wire:model="discount">
                                @error('discount') <p class="text-danger">{{$message}}</p>@enderror


                                <label>Service Total:</label>
                                <input type="text" class="form-control" id="total" name="total" wire:model="total" required>
                                @error('total') <p class="text-danger">{{$message}}</p>@enderror
                                <!-- End .summary-total -->

                                <div class="form-group">
                                    <label for="status" value="{{ __('status') }}">status</label>
                                    <select class="form-control" wire:model="status">
                                        <option value="">Select status</option>
                                        <option value="accepted">accepted</option>
                                        <option value="cancelled">cancelled</option>
                                    </select>
                                    @error('status') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Add Service</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</div>