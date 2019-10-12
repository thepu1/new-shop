@extends('admin.master')
@section('title')
    Manage Category
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center text-success">Category Table</h6>
            </div>
            <div class="card-body">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->first_name.' '.$order->last_name}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>
                                <a class="btn btn-info" title="View Order Details" href="{{route('view-order-details',$order->id)}}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary" title="View Order Invoice" href="{{route('view-order-invoice',$order->id)}}"><i class="fas fa-file-alt"></i></a>
                                <a class="btn btn-success" title="Download Order Invoices" href="{{route('download-order-invoice',$order->id)}}"><i class="fas fa-download"></i></a>
                                <a class="btn btn-secondary" title="Edit Order" href="{{route('edit-order',$order->id)}}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" title="Delete Order" href=""><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
