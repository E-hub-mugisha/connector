<div>
    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            @include('livewire.sprovider.navbar')

            <div class="d-sm-flex align-items-center justify-content-between mb-40 lg-mb-30">
                <h2 class="main-title m0">Service Booked</h2>
                <div class="d-flex ms-auto xs-mt-30">
                    <div class="nav nav-tabs tab-filter-btn me-4" id="nav-tab" role="tablist">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#a1" type="button" role="tab" aria-selected="true">All</button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#a2" type="button" role="tab" aria-selected="false">New</button>
                    </div>
                    <div class="short-filter d-flex align-items-center ms-auto">
                        <div class="text-dark fw-500 me-2">Short by:</div>
                        <select class="nice-select">
                            <option value="0">Active</option>
                            <option value="1">Pending</option>
                            <option value="2">Expired</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white card-box border-20">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="a1" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table job-alert-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($orders as $order)
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">{{$order->names}}</div>
                                            <div class="info1">{{$order->email}}</div>
                                        </td>
                                        <td>{{$order->date}}</td>
                                        <td>{{$order->time}}</td>
                                        <td>
                                            <div class="job-status">{{$order->status}}</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('sprovider.edit_order',['order_id'=>$order->id])}}"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_18.svg')}}" alt="" class="lazy-img"> View</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to update this!') || event.stopImmediatePropagation()" wire:click.prevent="validateOrder({{$order->id}})"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_19.svg')}}" alt="" class="lazy-img"> Confirmed</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to cancel this!') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder({{$order->id}})"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_20.svg')}}" alt="" class="lazy-img"> Cancel</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteOrder({{$order->id}})"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_21.svg')}}" alt="" class="lazy-img"> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table job-alert-table -->
                        </div>
                    </div>
                </div>

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