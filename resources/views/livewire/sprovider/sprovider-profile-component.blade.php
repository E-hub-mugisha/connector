<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            @if($sprovider->image)
                            <img src="{{asset('assets/images/sproviders')}}/{{$sprovider->image}}" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                            @else
                            <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                            @endif
                            <h5>{{Auth::user()->name}}</h5>
                            <p>{{$sprovider->about}}</p>
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{Auth::user()->email}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{Auth::user()->phone}}</p>
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>City</h6>
                                        <p class="text-muted">{{$sprovider->city}}</p>
                                    </div>

                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Service category</h6>
                                        <p class="text-muted">
                                            @if($sprovider->service_category_id)
                                            {{$sprovider->category->name}}
                                            @endif
                                        </p>

                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Service location</h6>
                                        <p class="text-muted">{{$sprovider->service_locations}}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>