<div>
    <div class="row justify-content-center">
        <div class="col-md-8 az-content-body d-flex flex-column">
            <div class="card mb-8">
                <div class="card-header">
                    <h2 class="az-content-title">Add Service</h2>
                </div>
                <div class="card-body">

                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form wire:submit.prevent="updateService">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="service_provider_id" wire:model="service_provider_id" value="{{$service_provider_id}}">
                                @error('service_provider_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

                        </div>
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
                            <label for="tagline" value="{{ __('tagline') }}">Tagline</label>
                            <input type="text" class="form-control" id="tagline" name="tagline" wire:model="tagline" required>
                            @error('tagline') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="service_category" value="{{ __('service_category') }}">Service category</label>
                            <select class="form-control" wire:model="service_category_id">
                                <option value="">Select service category</option>

                                <option value="{{$sprovider->category->id}}">{{$sprovider->category->name}}</option>

                            </select>
                            @error('service_category_id') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label>Duration *</label>
                            <input type="time" class="form-control" id="duration" name="duration" wire:model="duration" required>
                            @error('duration') <p class="text-danger">{{$message}}</p>@enderror

                        </div>
                        <div class="form-group">
                            <label for="price" value="{{ __('price') }}">Price</label>
                            <input type="text" class="form-control" id="price" name="price" wire:model="price" required>
                            @error('price') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="discount" value="{{ __('discount') }}">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" wire:model="discount">
                            @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="discount type" value="{{ __('discount type') }}">Discount type</label>
                            <select class="form-control" wire:model="discount_type">
                                <option value="">Select service category</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="description" value="{{ __('description') }}">description</label>
                            <textarea class="form-control" id="description" name="description" wire:model="description" required></textarea>
                            @error('description') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="inclusion" value="{{ __('inclusion') }}">Inclusion</label>
                            <textarea class="form-control" id="inclusion" name="inclusion" wire:model="inclusion" required></textarea>
                            @error('inclusion') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="exclusion" value="{{ __('exclusion') }}">Exclusion</label>
                            <textarea class="form-control" id="exclusion" name="exclusion" wire:model="exclusion" required></textarea>
                            @error('exclusion') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="newimage" value="{{ __('image') }}">image</label>
                            <input type="file" class="form-control" id="image" name="image" wire:model="newimage">
                            @error('newimage') <p class="text-danger">{{$message}}</p>@enderror
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="60" />
                            @else
                            <img src="{{asset('assets/images/products')}}/{{$image}}" width="60" />
                            @endif
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <label for="thumbnail" value="{{ __('thumbnail') }}">thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" wire:model="newthumbnail">
                            @error('newthumbnail') <p class="text-danger">{{$message}}</p>@enderror
                            @if($newthumbnail)
                            <img src="{{$newthumbnail->temporaryUrl()}}" width="60" />
                            @else
                            <img src="{{asset('assets/images/products/thumbnails')}}/{{$image}}" width="60" />
                            @endif
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span>update Service</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div>
    </div>
</div>