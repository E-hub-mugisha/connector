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
            <h6 class="m-0 font-weight-bold text-primary">Meet Our Users </h6>
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
                            <th>User name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>UTYPE</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                @if($user->image)
                                <img src="{{asset('assets/images/sproviders')}}/{{$user->image}}" alt="{{$user->name}}" width="60" height="50">
                                @else
                                <img src="{{ asset('assets/images/sproviders/avatar.jpg') }}" alt="{{$user->name}}" width="60" height="50">
                                @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>

                                {{$user->email}}

                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->location}}</td>
                            <td>{{$user->utype}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="adminActivate({{$user->id}})">Activate Admin</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to activate this!') || event.stopImmediatePropagation()" wire:click.prevent="customerActivate({{$user->id}})">Activate Customer</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>