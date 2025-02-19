<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <h2 class="main-title">Post a New Service</h2>

            <div class="bg-white card-box border-20">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal" wire:submit.prevent="updateProfile">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6 dash-input-wrapper mb-30 form-group">
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload Profile
                                <input type="file" class="form-control-file" id="image" name="image" wire:model="newimage" required>
                                @error('newimage')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="220" />
                            @elseif ($image)
                            <img src="{{ asset('assets/images/sproviders') }}/{{ $image }}" width="220" />
                            @else
                            <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" width="220" />
                            @endif
                        </div>
                    </div>
                    <div class=" dash-input-wrapper mb-30 form-group">
                        <label for="about" class="control-label">About: </label>
                        <textarea class="form-control" name="about" wire:model="about" required></textarea>
                        @error('about')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="image" class="control-label ">PassPort/ID </label>
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload File

                                <input type="file" class="form-control-file" id="nid" name="nid" wire:model="nid">
                            </div>
                            @error('nid')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="image" class="control-label">Education certificate </label>
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload File
                                <input type="file" class="form-control-file" id="certificate" name="certificate" wire:model="certificate">
                            </div>
                            @error('certificate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="image" class="control-label">Criminal record </label>
                            <div class="dash-btn-one d-inline-block position-relative me-3">
                                <i class="bi bi-plus"></i>
                                Upload File
                                <input type="file" class="form-control-file" id="criminal_record" name="criminal_record" wire:model="criminal_record">
                            </div>
                            @error('criminal_record')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="city" class="control-label">city: </label>
                            <input type="text" class="form-control" name="city" wire:model="city" required>
                            @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="service_category_id" class="control-label">Service Category: </label>

                            <select name="service_category_id" class="nice-select form-control" wire:model="service_category_id" required>
                                <option value="">select service category</option>
                                @foreach ($scategories as $scategory)
                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                @endforeach
                            </select>
                            @error('service_category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-4 dash-input-wrapper mb-30 form-group">
                            <label for="service_location" class="control-label">Service Locations</label>

                            <input type="text" class="form-control" name="service_locations" wire:model="service_locations" required>
                            @error('service_locations')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>