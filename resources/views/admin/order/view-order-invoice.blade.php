@extends('admin.master')
@section('title')
    Manage Category
@endsection

@section('body')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header bg-dark">
                <h6 class="m-0 font-weight-bold text-center text-white">I N V O I C E</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h1 class="text-danger font-weight-bold border-bottom-info"><span class="text-info">New</span> Shop</h1>
                        <h6>Address: G-Block, Road-15, Bashundhara, Dhaka, Bangladesh 1206</h6>
                        <h6>TL: 02 0999444</h6>
                    </div>
                    <div class="col-md-9 d-flex justify-content-end">
                            <table class="table table-bordered col-md-7 text-center">
                                <tr>
                                    <th class="bg-info text-white">Invoice No #</th>
                                    <td>0000{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-info text-white">Date</th>
                                    <td>{{date('d-M-Y',strtotime($order->created_at))}}</td>
                                </tr>
                                <tr>
                                    <th class="bg-info text-white">Amount Due</th>
                                    <td>TK. {{$order->order_total}}</td>
                                </tr>
                            </table>
                    </div>
                </div>
              <div class="row mt-5">
                  <div class="col-md-4">
                      <h5 class="text-center text-info font-weight-bold">Shipping Info</h5>
                      <table class="table">
                          <tr>
                              <th>Name</th>
                              <td>{{$shipping->full_name}}</td>
                          </tr>
                          <tr>
                              <th>Phone</th>
                              <td>{{$shipping->phone}}</td>
                          </tr>
                          <tr>
                              <th>Address</th>
                              <td>{{$shipping->address}}</td>
                          </tr>
                      </table>
                  </div>
                  <div class="col-md-8 d-flex justify-content-end">
                      <div class="col-6">
                          <h5 class="text-center text-info font-weight-bold">Billing Info</h5>
                          <table class="table">
                              <tr>
                                  <th>Name</th>
                                  <td>{{$coustomer->first_name.' '.$coustomer->last_name}}</td>
                              </tr>
                              <tr>
                                  <th>Phone</th>
                                  <td>{{$coustomer->phone}}</td>
                              </tr>
                              <tr>
                                  <th>Address</th>
                                  <td>{{$coustomer->address}}</td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <table class="table-bordered table text-center">
                            <tr class="bg-info text-white">
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                            @php($sum=0)
                            @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>TK. {{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_quantity}}</td>
                                <td>TK. {{$subtotal=$orderDetail->product_price * $orderDetail->product_quantity}}</td>
                                <?php
                                $sum=$sum+$subtotal;
                                $tax=$sum*5/100;
                                $total = $sum+ $tax;
                                ?>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <table class="table w-25">
                            <tr>
                                <th>Total</th>
                                <td>TK. {{$sum}}</td>
                            </tr>
                            <tr>
                                <th>Tax 5%</th>
                                <td>TK. {{$tax}}</td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td>Tk. {{$total}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h5 class="col-2">Additonal Notes</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
