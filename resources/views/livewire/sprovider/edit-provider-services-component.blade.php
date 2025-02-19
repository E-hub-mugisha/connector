<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <h2 class="main-title">Edit Service Details</h2>

            <div class="bg-white card-box border-20">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form wire:submit.prevent="updateService">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="name" value="{{ __('name') }}">name *</label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" required>
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->

                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="slug" value="{{ __('slug') }}">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                            @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="tagline" value="{{ __('tagline') }}">Tagline</label>
                            <input type="text" class="form-control" id="tagline" name="tagline" wire:model="tagline" required>
                            @error('tagline') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label>Duration *</label>
                            <input type="text" class="form-control" id="duration" name="duration" wire:model="duration" required>
                            @error('duration') <p class="text-danger">{{$message}}</p>@enderror

                        </div>

                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="location" value="{{ __('location') }}">location</label>
                            <input type="text" class="form-control" id="location" name="location" wire:model="location">
                            @error('location') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="service_category" value="{{ __('service_category') }}">Service category</label>
                            <select class="form-control nice-select" wire:model="service_category_id">
                                <option value="">Select service category</option>

                                <option value="{{$sprovider->category->id}}">{{$sprovider->category->name}}</option>

                            </select>
                            @error('service_category_id') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="price" value="{{ __('price') }}">Price</label>
                            <input type="text" class="form-control" id="price" name="price" wire:model="price" required>
                            @error('price') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="discount" value="{{ __('discount') }}">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" wire:model="discount">
                            @error('discount') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->

                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="discount type" value="{{ __('discount type') }}">Discount type</label>
                            <select class="form-control nice-select" wire:model="discount_type">
                                <option value="">Select type</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            @error('discount_type') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-12 dash-input-wrapper mb-30 form-group">
                            <label for="description" value="{{ __('description') }}">description</label>
                            <textarea class="form-control" id="description" name="description" wire:model="description" required></textarea>
                            @error('description') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->

                        <div class="col-md-6 dash-input-wrapper mb-30 form-group">
                            <label for="inclusion" value="{{ __('inclusion') }}">Inclusion</label>
                            <textarea class="form-control" id="inclusion" name="inclusion" wire:model="inclusion" required></textarea>
                            @error('inclusion') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->

                        <div class="col-md-6 dash-input-wrapper mb-30 form-group">
                            <label for="exclusion" value="{{ __('exclusion') }}">Exclusion</label>
                            <textarea class="form-control" id="exclusion" name="exclusion" wire:model="exclusion" required></textarea>
                            @error('exclusion') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->


                        <div class="col-md-6 dash-input-wrapper mb-30 form-group">
                            <label for="newimage" value="{{ __('image') }}">image</label>
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload Image
                                <input type="file" class="form-control" id="image" name="image" wire:model="newimage">
                                @error('newimage') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="60" />
                            @else
                            <img src="{{asset('assets/images/products')}}/{{$image}}" width="60" />
                            @endif
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                        <div class="col-md-6 dash-input-wrapper mb-30 form-group">
                            <label for="thumbnail" value="{{ __('thumbnail') }}">thumbnail</label>
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload Image
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" wire:model="newthumbnail">
                                @error('newthumbnail') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            @if($newthumbnail)
                            <img src="{{$newthumbnail->temporaryUrl()}}" width="60" />
                            @else
                            <img src="{{asset('assets/images/products/thumbnails')}}/{{$image}}" width="60" />
                            @endif
                        </div><!-- End  dash-input-wrapper mb-30.form-group -->
                    </div>
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