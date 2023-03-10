<div>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
            <div class="card col-md-8 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" wire:submit.prevent="updateProfile">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6 form-group">
                                <label for="image" class="control-label">Profile Image: </label>
                                <input type="file" class="form-control-file" id="image" name="image" wire:model="newimage" required>
                                @error('newimage')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="220" />
                                @elseif ($image)
                                <img src="{{ asset('assets/images/sproviders') }}/{{ $image }}" width="220" />
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" width="220" />
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about" class="control-label">About: </label>
                            <textarea class="form-control" name="about" wire:model="about" required></textarea>
                            @error('about')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label ">PassPort/ID </label>

                                <input type="file" class="form-control-file" id="nid" name="nid" wire:model="nid">
                                @error('nid')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label">Education certificate </label>

                                <input type="file" class="form-control-file" id="certificate" name="certificate" wire:model="certificate">
                                @error('certificate')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 form-group">
                                <label for="image" class="control-label">Criminal record </label>

                                <input type="file" class="form-control-file" id="criminal_record" name="criminal_record" wire:model="criminal_record">
                                @error('criminal_record')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-4 form-group">
                                <label for="city" class="control-label">city: </label>
                                <input type="text" class="form-control" name="city" wire:model="city" required>
                                @error('city')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="service_category_id" class="control-label">Service Category: </label>

                                <select name="service_category_id" class="form-control" wire:model="service_category_id" required>
                                    <option value="">select service category</option>
                                    @foreach ($scategories as $scategory)
                                    <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 form-group">
                                <label for="service_location" class="control-label">Service Locations Zipcode/Pincode: </label>

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