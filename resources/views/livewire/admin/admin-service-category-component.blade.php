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
            <h6 class="m-0 font-weight-bold text-primary">Service Category </h6>
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
                            <th>category name</th>
                            <th>Featured</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scategories as $scategory)
                        <tr>
                            <td>{{$scategory->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('assets/images/category')}}/{{$scategory->image}}" alt="{{$scategory->name}}" height="50" width="60">
                                </a>
                            </td>
                            <td>
                                <a href="#">{{$scategory->name}}</a>
                            </td>
                            <td>
                                @if($scategory->featured)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.service_by_category',['category_slug'=>$scategory->slug])}}">List</a>
                                        <a class="dropdown-item" href="{{route('admin.edit_service_category',['category_id'=>$scategory->id])}}">Edit</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{$scategory->id}})">Delete</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$scategories->links()}}
            </div>
        </div>
    </div>
</div>