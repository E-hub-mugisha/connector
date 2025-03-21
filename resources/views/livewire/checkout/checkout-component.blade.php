<div>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Names *</label>
                                    <input type="text" name="names" id="names" wire:model="names" class="form-control" value="{{Auth::user()->name}}" required>
                                    @error('names')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Email *</label>
                                    <input type="text" name="email" id="email" wire:model="email" class="form-control" value="{{Auth::user()->email}}" required>
                                    @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" id="phone" wire:model="phone" class="form-control" value="{{Auth::user()->phone}}" required>
                                    @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>Street address *</label>
                                    <input type="text" name="location" id="location" wire:model="location" class="form-control" value="{{Auth::user()->location}}" required>
                                    @error('location')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <label>Order notes (optional)</label>
                            <textarea class="form-control" name="notes" id="notes" wire:model="notes" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            @error('notes')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{Cart::subtotal()}}<span class="text-color-success">RWF</span></td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            
                                            <td>{{ Cart::total()}}<span class="text-color-success">RWF</span></td>
                                            
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card">
                                            <div class="row">
                                                <!-- <label for="payment" class="col" value="{{ __('payment') }}">Select payment mode</label> -->
                                                <select class="col form-control" id="payment_mode" name="payment_mode" wire:model="payment_mode">
                                                    <option value="">Select Payment Mode</option>
                                                    <option value="check-payment">Check payments</option>
                                                    <option value="cash-on-delivery">Cash on delivery</option>
                                                    <option value="bank-transfer">Bank transfer</option>
                                                </select>
                                                @error('payment_mode') <p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->
                                </div><!-- End .card-header -->


                                <button type="submit" class="btn btn-outline-primary-2  btn-block">
                                    Place Order
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</div>