@extends('admin.master')
@section('title')
    Manage Category
@endsection

@section('body')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary">
                <h6 class="m-0 font-weight-bold text-center text-white">Order Details Info For This Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Order No</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>TK. {{$order->order_total}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{date('d-M-Y',strtotime($order->created_at))}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header bg-info">
                <h6 class="m-0 font-weight-bold text-center text-white">Cutomer Info For This Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                      <tr>
                          <th>Customer Name</th>
                          <td>{{$coustomer->first_name.' '.$coustomer->last_name}}</td>
                      </tr>
                        <tr>
                            <th>Phone Address</th>
                            <td>{{$coustomer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{$coustomer->email}}</td>
                        </tr>
                        <tr>
                            <th>Addrees</th>
                            <td>{{$coustomer->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header bg-success">
                <h6 class="m-0 font-weight-bold text-center text-white">Shipping Info For This Order</h6>
            </div>
            <div class="card-body">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Full Name</th>
                            <td>{{$shipping->full_name}}</td>
                        </tr>
                        <tr>
                            <th>Phone Address</th>
                            <td>{{$shipping->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{$shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>Addrees</th>
                            <td>{{$shipping->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center text-success">Payment Info For This Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{$payment->payment_type}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$payment->payment_status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center text-success">Product Info For This Order</h6>
            </div>
            <div class="card-body">
                <h4 class="text-center text-success"></h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-info text-white">
                        <tr>
                            <th>SL No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @php($sum=0)
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$orderDetail->product_id}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>TK. {{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_quantity}}</td>
                                <td>TK. {{$subtotal=$orderDetail->product_price * $orderDetail->product_quantity}}</td>
                                  <?php
                                    $sum=$sum + $subtotal;
                                    $tax=$sum*5/100; ?>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card col-4">
                            <div class="card-body">
                                <table class="table text-right">
                                    <tr>
                                        <td colspan="5" class="text-right">Total</td>
                                        <td colspan="1">Tk.{{$sum}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Tax 5% </td>
                                        <td colspan="1">Tk.{{$tax}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total</td>
                                        <td colspan="1">Tk.{{$sum+$tax}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
