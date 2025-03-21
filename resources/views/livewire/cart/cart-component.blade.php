<div>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success</strong>{{Session::get('success_message')}}
                        </div>
                        @endif
                        @if(Cart::count() > 0)
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{route('product-detail',['product_slug'=>$item->model->slug])}}">
                                                    <img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{route('product-detail',['product_slug'=>$item->model->slug])}}">{{ $item->model->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $item->model->regular_price }}<span class="text-color-success">RWF</span></td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="{{$item->qty}}" min="1" max="10" step="1" data-decimals="0" required>
                                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</a>
                                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</a>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">{{$item->Subtotal()}}<span class="text-color-success">RWF</span></td>
                                    <td class="remove-col"><button class="btn-remove" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="icon-close"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                        @else
                        <p> No item in cart</p>
                        @endif
                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2" wire:click.prevent="destroyAll()"><span>Clear All CART Items</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{Cart::subtotal()}}<span class="text-color-success">RWF</span></td>
                                    </tr><!-- End .summary-subtotal -->
                                    


                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{ Cart::total()}}<span class="text-color-success">RWF</span></td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{route('shop.shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</div>