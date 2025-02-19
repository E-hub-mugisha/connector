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

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @if($sprovider->image)
                            <img src="{{asset('assets/images/sproviders')}}/{{$sprovider->image}}" alt="{{Auth::user()->name}}" class="img-fluid my-5" style="width: 100px;" />
                            @else
                            <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{Auth::user()->name}}" class="img-fluid my-5" style="width: 100px;" />
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{Auth::user()->name}}
                            </h5>
                            <h6>
                                Service Provider
                            </h6>
                            <p>
                                {{$sprovider->about}}
                            </p>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('sprovider.edit_profile')}}" class="bnt btn-primary profile-edit-btn" name="btnAddMore">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Location</p>
                            <a href="">{{$sprovider->city}}</a>
                            <p>Service Location</p>
                            <a href="">{{$sprovider->service_locations}}</a><br />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->phone}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            @if($sprovider->service_category_id)
                                            {{$sprovider->category->name}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>