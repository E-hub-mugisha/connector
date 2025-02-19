<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <h2 class="main-title">Post a image on a Service</h2>

            <div class="bg-white card-box border-20">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form action="/createPortfolioService" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- /.dash-input-wrapper -->
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="service" value="{{ __('service') }}">Service name</label>
                                <select class="nice-select" name="service_id" id="service_id">
                                    <option value="">Select service </option>
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                                @error('service_id') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="tag" value="{{ __('tag') }}">Tag</label>
                                <input type="text" class="form-control" id="tag" name="tag" required>
                                @error('tag') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div>

                    <!-- /.dash-input-wrapper -->
                    <div class="dash-btn-one d-inline-block position-relative me-3">
                        <label for="image1" value="{{ __('image1') }}">image1</label>
                        <i class="bi bi-plus"></i>
                        Upload Image1
                        <input type="file" class="form-control" id="image1" name="image1" required>
                        @error('image1') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <small>Upload image</small>
                    <div class="dash-btn-one d-inline-block position-relative me-3">
                        <label for="image2" value="{{ __('image2') }}">image2</label>
                        <i class="bi bi-plus"></i>
                        Upload Image 2
                        <input type="file" class="form-control" id="image2" name="image2" required>
                        @error('image2') <p class="text-danger">{{$message}}</p>@enderror

                    </div>
                    <small>Upload image</small>

                    <!-- /.card-box -->

                    <div class="button-group d-flex align-items-center mt-30">
                        <button type="submit" class="dash-btn-two tran3s me-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.dashboard-body -->
</div>