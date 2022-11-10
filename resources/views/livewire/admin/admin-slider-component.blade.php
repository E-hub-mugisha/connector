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
            <h6 class="m-0 font-weight-bold text-primary">Sliders</h6>
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
                            <th>Slider name</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td>
                                <a href="#">
                                    <img src="{{asset('assets/images/slider')}}/{{$slider->image}}" alt="{{$slider->title}}" height="50" width="60">
                                </a>
                            </td>
                            <td>
                                <a href="#">{{$slider->title}}</a>
                            </td>
                            <td>
                                @if($slider->status)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>{{$slider->created_at}}</td>
                            <td class="action-col">
                                <div class="dropdown">
                                    <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list-alt"></i>Select Options
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.edit_slider',['slide_id'=>$slider->id])}}">Edit</a>
                                        <a class="dropdown-item" href="#" onclick="confirm('are you sure, you want to delete this!') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlider({{$slider->id}})">Delete</a>
                                        <a class="dropdown-item" href="#">The best option</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$sliders->links()}}
            </div>
        </div>
    </div>
</div>