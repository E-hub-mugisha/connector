<div>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-8 az-content-body d-flex flex-column">
            <div class="card ">
                <div class="card-header">
                    <h2 class="az-content-title">Update Profile</h2>
                </div>
                <div class="card-body">

                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateProfile">
                        @csrf
                        <div class="form-group">
                            <label for="image" class="control-label col-sm-3">Profile Image: </label>
                            <div class="col-sm-9">
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
                            <label for="name" class="control-label col-sm-3">sprovider_name:{{$sprovider->user->name}} </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sprovider_name" wire:model="sprovider_name" value="{{$sprovider->user->name}}">
                                @error('sprovider_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label col-sm-3">PassPort/ID </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="nid" name="nid" wire:model="nid">
                                @error('nid')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label col-sm-3">Education certificate </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="certificate" name="certificate" wire:model="certificate">
                                @error('certificate')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label col-sm-3">Criminal record </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="criminal_record" name="criminal_record" wire:model="criminal_record">
                                @error('criminal_record')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about" class="control-label col-sm-3">About: </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="about" wire:model="about" required></textarea>
                                @error('about')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label col-sm-3">city: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="city" wire:model="city" required>
                                @error('city')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service_category_id" class="control-label col-sm-3">Service Category: </label>
                            <div class="col-sm-9">
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
                        </div>
                        <div class="form-group">
                            <label for="service_location" class="control-label col-sm-3">Service Locations Zipcode/Pincode: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_locations" wire:model="service_locations" required>
                                @error('service_locations')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-sm-3"></label>
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