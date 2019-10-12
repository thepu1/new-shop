@extends('front.master')
@section('title')
    Product Details
@endsection

@section('body')
    <script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/coustom.css">
    <style>
        .plus{
            border: none;
            font-size: 20px;
            width: 40px;
            height: 40px;
            background: #eee;
        }
        .minus{
            border: none;
            font-size: 20px;
            width: 40px;
            height: 40px;
            background: #eee;
        }
        .qty{
            border: none;
            width: 40px;
            height: 40px;
            font-size: 20px;
            text-align: center;
            background: #eee;
        }
        form {
            width: 0;
            margin: 0 auto;
            text-align: center;
            padding-top: 0;
        }
    </style>
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Single</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center text-danger ">My Shopping Cart</h4>
                        <br>
                        <table class="table table-bordered text-center">
                            <tr class="bg-success">
                                <th>SL No</th>
                                <th>Nmae</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>


                            @php($i=1)
                            @php($sum =0)
                            @foreach($cartProducts as $cartProduct)
                            <tr id="tr{{$cartProduct->rowId}}">
                                <td>{{$i++}}</td>
                                <td>{{$cartProduct->name}}</td>
                                <td><img src="{{asset($cartProduct->options->image)}}" width="80" height="60" alt=""></td>
                                <td> {{$cartProduct->price}}</td>
                                <td>
                                    <input type="submit" class="minus" value="-" id="minus{{$cartProduct->rowId}}">
                                    <input type="text" class="qty" id="qty{{$cartProduct->rowId}}" value="{{$cartProduct->qty}}" name="qty">
                                    <input type="hidden" id="price{{$cartProduct->rowId}}" value="{{$cartProduct->price}}" name="price">
                                    <input type="hidden" id="rowId{{$cartProduct->rowId}}" value="{{$cartProduct->rowId}}" name="rowId">
                                    <input type="submit" class="plus" value="+" id="plus{{$cartProduct->rowId}}">


                                    <script>
                                        var plus      = document.getElementById('plus'+'{{$cartProduct->rowId}}');

                                      plus.onclick=function () {
                                          var rowId     = document.getElementById('rowId'+'{{$cartProduct->rowId}}').value;
                                          var qty       = document.getElementById('qty'+'{{$cartProduct->rowId}}').value;
                                          var price     = document.getElementById('price'+'{{$cartProduct->rowId}}').value;
                                          qty++
                                          document.getElementById('qty'+'{{$cartProduct->rowId}}').value= qty;
                                          var subtotal = price * qty ;

                                          document.getElementById('subtotal'+'{{$cartProduct->subtotal}}').innerHTML=subtotal;



                                          $.ajax(
                                              {
                                                  url: 'http://localhost:8076/new-shop/public/cart/update-cart-item/'+rowId+qty,
                                                  method: 'get',
                                                  success: function (data){
                                                      document.getElementById('grandtotal').innerText=data.total;
                                                      document.getElementById('tax').innerText=data.tax;
                                                      document.getElementById('item_total').innerText=data.item_total;
                                                      document.getElementById('cart_count').innerText=data.cart_count;
                                                  }
                                              })
                                      }

                                        var minus      = document.getElementById('minus'+'{{$cartProduct->rowId}}');
                                        minus.onclick=function () {
                                            var rowId     = document.getElementById('rowId'+'{{$cartProduct->rowId}}').value;
                                            {{--var qty       = document.getElementById('qty'+'{{$cartProduct->rowId}}').value;--}}
                                            var price     = document.getElementById('price'+'{{$cartProduct->rowId}}').value;
                                                var qty = parseInt(document.getElementById('qty'+'{{$cartProduct->rowId}}').value, 10);
                                                qty = isNaN(qty) ? 1 : qty;
                                                qty < 2 ? qty = 2 : '';
                                                qty--;
                                            document.getElementById('qty'+'{{$cartProduct->rowId}}').value= qty;
                                            var subtotal = price * qty ;
                                            document.getElementById('subtotal'+'{{$cartProduct->subtotal}}').innerHTML=subtotal;

                                            $.ajax(
                                                {
                                                    url: 'http://localhost:8076/new-shop/public/cart/update-cart-item/'+rowId+qty,
                                                    method: 'get',
                                                    success: function (data){
                                                        document.getElementById('grandtotal').innerText=data.total;
                                                        document.getElementById('tax').innerText=data.tax;
                                                        document.getElementById('item_total').innerText=data.item_total;
                                                        document.getElementById('cart_count').innerText=data.cart_count;
                                                    }
                                                })
                                        }

                                    </script>
                                </td>
                                <td id="subtotal{{$cartProduct->subtotal}}">{{$cartProduct->subtotal}}</td>
                                <td>
                                    <a href="{{route('delete-cart-item',$cartProduct->rowId)}}" class="deleteRecord">

                                        <span class="glyphicon glyphicon-trash text-danger"></span>
                                        {{--<input type="button" id="delete{{$cartProduct->rowId}}" value="delete">--}}
                                        {{--<input type="hidden" id="deleteRowId{{$cartProduct->rowId}}" value="{{$cartProduct->rowId}}" name="rowId">--}}

                                        {{--<script>--}}
                                            {{--var delete_btn = document.getElementById('delete'+'{{$cartProduct->rowId}}');--}}
                                            {{--delete_btn.onclick = function () {--}}
                                                {{--var rowId = document.getElementById('deleteRowId'+'{{$cartProduct->rowId}}').value;--}}
                                                {{--$.ajax({--}}

                                                    {{--url: 'http://localhost:8076/new-shop/public/cart/delete-cart-item/'+rowId,--}}
                                                    {{--method: 'get',--}}
                                                    {{--success:function (data) {--}}
                                                        {{--document.getElementById('tr'+'{{$cartProduct->rowId}}').remove(data);--}}
                                                    {{--}--}}
                                                {{--})--}}
                                            {{--}--}}
                                        {{--</script>--}}

                                    </a>
                                </td>
                            </tr>
                                @endforeach
                        </table>
                        <table class="table-bordered table">
                            <tr>
                                <th class="text-right" style="width: 88%">Subtotal:</th>
                                <td id="item_total">{{$item_total}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Tax(5%) </th>
                                <td id="tax">{{$tax}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Total (TK.)</th>
                                {{--<td id="grandtotal">{{$sum}}.00</td>--}}
                                <td id="grandtotal">{{$total}}
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            @if($cart_count >0)
                    <div class="row">
                        <div class="col-md-2">
                            <a class="btn btn-success btn-block" href="{{route('/')}}">Continue Shopping</a>
                        </div>
                        <div class="col-md-offset-8 col-md-2">
                            @if(Session::get('coustomerId') && Session::get('shippingId'))

                                <a class="btn btn-success btn-block" href="{{route('checkout-payment')}}">Check Out</a>

                                @elseif(Session::get('coustomerId'))
                                <a class="btn btn-success btn-block" href="{{route('checkout-shipping')}}">Check Out</a>
                            @else
                                <a class="btn btn-success btn-block" href="{{route('check-out')}}">Check Out</a>
                            @endif
                        </div>
                    </div>
            </div>
            @else
                @endif
        </div>
    </div>
@endsection
