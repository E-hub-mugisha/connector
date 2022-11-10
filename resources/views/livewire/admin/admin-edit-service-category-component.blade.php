<div>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Service category</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form wire:submit.prevent="updateServiceCategory">
                        @csrf
                        <div class="form-group">
                            <label for="name" value="{{ __('Category name') }}">Category name *</label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" required>
                            @error('name') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="slug" value="{{ __('Category slug') }}">Category Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" required>
                            @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="featured" value="{{ __('featured') }}">featured</label>
                            <select class="form-control" wire:model="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="image" value="{{ __('Category image') }}">Category image</label>
                            <input type="file" class="form-control" id="image" name="image" wire:model="newimage">
                            @error('newimage') <p class="text-danger">{{$message}}</p>@enderror
                            @if($newimage)
                            <img src="{{$newimage->temporaryUrl()}}" width="60" />
                            @else
                            <img src="{{asset('assets/images/category')}}/{{$image}}" width="60" />
                            @endif
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Update Service category</span>
                            </button>
                        </div><!-- End .form-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>