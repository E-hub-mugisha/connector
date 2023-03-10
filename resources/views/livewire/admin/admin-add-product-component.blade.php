<div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow" style="padding: 24px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <div class="container">
                    <div id="signin-2">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form wire:submit.prevent="createProduct">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="name" value="{{ __('name') }}">name *</label>
                                    <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" required>
                                    @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="col-md-4 form-group">
                                    <label for="slug" value="{{ __('slug') }}">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                                    @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="brand" value="{{ __('brand') }}">Product Brand</label>
                                    <input type="text" class="form-control" id="brand" name="brand" wire:model="brand" required>
                                    @error('brand') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->


                                <div class="col-md-6 form-group">
                                    <label for="category" value="{{ __('category') }}">Product category</label>
                                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">Select Product category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="scategory" value="{{ __('scategory') }}">Product Sub category</label>
                                    <select class="form-control" wire:model="scategory_id">
                                        <option value="0">Select Product Sub category</option>
                                        @foreach($scategories as $scategory)
                                        <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="col-md-4 form-group">
                                    <label for="regular_price" value="{{ __('regular_price') }}">regular Price</label>
                                    <input type="text" class="form-control" id="regular_price" name="regular_price" wire:model="regular_price" required>
                                    @error('regular_price') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="quantity" value="{{ __('quantity') }}">quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" wire:model="quantity">
                                    @error('quantity') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->
                                <div class="col-md-4 form-group">
                                    <label for="stock_status" value="{{ __('stock_status') }}">stock_status</label>
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="">Select Stock status</option>
                                        <option value="instock">instock</option>
                                        <option value="outofstock">outofstock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="short_description" value="{{ __('short_description') }}">Short description</label>
                                    <textarea class="form-control" id="short_description" name="short_description" wire:model="short_description" required></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="col-md-6 form-group">
                                    <label for="description" value="{{ __('description') }}">description</label>
                                    <textarea class="form-control" id="description" name="description" wire:model="description" required></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p>@enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="image" value="{{ __('image') }}">image</label>
                                    <input type="file" class="form-control" id="image" name="image" wire:model="image" required>
                                    @error('image') <p class="text-danger">{{$message}}</p>@enderror
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="60" />
                                    @endif
                                </div><!-- End .form-group -->

                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">
                                    <span>Add Product</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
</div>