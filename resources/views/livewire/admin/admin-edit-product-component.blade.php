<div>
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active">update Product</a>
                        </li>
                    </ul>
                    <div>
                        <div id="signin-2">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form wire:submit.prevent="updateProduct">
                                @csrf
                                <div class="form-group">
                                    <label for="name" value="{{ __('name') }}">name *</label>
                                    <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" required>
                                    @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="slug" value="{{ __('slug') }}">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                                    @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="SKU" value="{{ __('SKU') }}">SKU</label>
                                    <input type="text" class="form-control" id="SKU" name="SKU" wire:model="SKU" required>
                                    @error('SKU') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->


                                <div class="form-group">
                                    <label for="category" value="{{ __('category') }}">Product category</label>
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Product category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="regular_price" value="{{ __('regular_price') }}">regular Price</label>
                                    <input type="text" class="form-control" id="regular_price" name="regular_price" wire:model="regular_price" required>
                                    @error('regular_price') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="quantity" value="{{ __('quantity') }}">quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" wire:model="quantity">
                                    @error('quantity') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="stock_status" value="{{ __('stock_status') }}">stock_status</label>
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="">Select Stock status</option>
                                        <option value="instock">instock</option>
                                        <option value="outofstock">outofstock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="short_description" value="{{ __('short_description') }}">description</label>
                                    <textarea class="form-control" id="short_description" name="short_description" wire:model="short_description" required></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="description" value="{{ __('description') }}">description</label>
                                    <textarea class="form-control" id="description" name="description" wire:model="description" required></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="image" value="{{ __('image') }}">image</label>
                                    <input type="file" class="form-control" id="image" name="image" wire:model="newimage" required>
                                    @error('newimage') <p class="text-danger">{{$message}}</p>@enderror
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="60" />
                                    @else
                                    <img src="{{asset('assets/images/category/products')}}/{{$image}}" width="60" />
                                    @endif
                                </div><!-- End .form-group -->


                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>update Product</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</div>