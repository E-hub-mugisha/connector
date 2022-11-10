<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Meet Our Service Providers </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Service Provider name</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sproviders as $sprovider)
                        <tr>
                            <td>{{$sprovider->id}}</td>
                            <td>
                                @if($sprovider->image)
                                <img src="{{asset('assets/images/sproviders')}}/{{$sprovider->image}}" alt="{{$sprovider->user->name}}" width="60" height="50">
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$sprovider->user->name}}" width="60" height="50">
                                @endif
                            </td>
                            <td>{{$sprovider->user->name}}</td>
                            <td>
                                @if($sprovider->service_category_id)
                                {{$sprovider->category->name}}
                                @endif
                            </td>
                            <td>{{$sprovider->user->phone}}</td>
                            <td>{{$sprovider->user->location}}</td>
                            <td>{{$sprovider->status}}</td>
                            <td>{{$sprovider->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="activate({{$sprovider->id}})">Activate</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="deactivate({{$sprovider->id}})">DeActivate</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$sproviders->links()}}
            </div>
        </div>
    </div>
</div>