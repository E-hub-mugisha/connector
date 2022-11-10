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
            <h6 class="m-0 font-weight-bold text-primary">orders </h6>
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
                            <th>total</th>
                            <th>names</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($porders as $porder)
                        <tr>
                            <td>{{$porder->id}}</td>
                            <td>
                                {{$porder->total}}
                            </td>
                            <td>{{ $porder->names }}</td>
                            <td>{{$porder->email}}</td>
                            <td>
                                {{$porder->phone}}
                            </td>
                            <td>
                                {{$porder->location}}
                            </td>
                            <td>
                                @if($porder->status == 'Delivered')
                                <span class="text-success">{{$porder->status}}</span>
                                @elseif($porder->status == 'cancelled')
                                <span class="text-danger">{{$porder->status}}</span>
                                @elseif($porder->status == 'ordered')
                                <span class="text-primary">{{$porder->status}}</span>
                                @endif
                            </td>
                            <td class="action-col">
                                <a class="btn btn-primary" href="{{route('admin.product_order_detail',['order_id'=>$porder->id])}} ">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$porders->links()}}
            </div>
        </div>
    </div>
</div>
