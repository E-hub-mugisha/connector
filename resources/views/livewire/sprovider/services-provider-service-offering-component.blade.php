<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <div class="d-flex align-items-center justify-content-between mb-40 lg-mb-30">
                <h2 class="main-title m0">Service we provide</h2>
                <div class="short-filter d-flex align-items-center">
                    <div class="text-dark fw-500 me-2">Short by:</div>
                    <select class="nice-select">
                        <option value="0">Newest</option>
                        <option value="1">Pending</option>
                        <option value="2">Expired</option>
                    </select>
                </div>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="wrapper">
                @foreach($offerings as $serv)
                <div class="candidate-profile-card list-layout border-0 mb-25">
                    <div class="d-flex">
                        <div class="cadidate-avatar online position-relative d-block me-auto ms-auto">
                            <a href="#" class="rounded-circle">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('assets/images/products/thumbnails')}}/{{$serv->thumbnail}}" alt="" class="lazy-img rounded-circle">
                            </a>
                        </div>
                        <div class="right-side">
                            <div class="row gx-1 align-items-center">
                                <div class="col-xl-3">
                                    <div class="position-relative">
                                        <h4 class="candidate-name mb-0"><a href="#" class="tran3s">{{$serv->name}}</a></h4>
                                        <div class="candidate-post">{{$serv->category->name}}</div>
                                        <ul class="cadidate-skills style-none d-flex align-items-center">
                                            
                                            @if($serv->status)
                                            <li class="more">Active</li>
                                            @else
                                            <li>Inactive</li>
                                            @endif
                                                                                       
                                        </ul>
                                        <!-- /.cadidate-skills -->
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="candidate-info">
                                        <span>Price</span>
                                        <div>{{$serv->price}}</div>
                                    </div>
                                    <!-- /.candidate-info -->
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="position-relative">
                                        <div class="candidate-post">featured</div>
                                        <ul class="cadidate-skills style-none d-flex align-items-center">
                                            
                                            @if($serv->featured)
                                            <li class="more">Yes</li>
                                            @else
                                            <li>No</li>
                                            @endif
                                                                                       
                                        </ul>
                                        <!-- /.cadidate-skills -->
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                    <div class="d-flex justify-content-md-end align-items-center">
                                        <a href="#" class="save-btn text-center rounded-circle tran3s mt-10 fw-normal"><i class="bi bi-eye"></i></a>
                                        <div class="action-dots float-end mt-10 ms-2">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{route('sprovider.edit_service',['service_slug'=>$serv->slug])}}"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$serv->id}})"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.candidate-profile-card -->
                @endforeach
            </div>
            <!-- /.card-box -->


            <div class="dash-pagination d-flex justify-content-end mt-30">
                <ul class="style-none d-flex align-items-center">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li>..</li>
                    <li><a href="#">7</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.dashboard-body -->
</div>