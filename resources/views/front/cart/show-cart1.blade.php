@extends('front.master')

@section('title')
    @endsection
@section('body')

    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <h2>My Shopping Bag (3)</h2>
                <script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>

                <script>

                    $(document).ready(function(c) {
                    $('.close1').on('click', function(c){
                    $('.cart-header').fadeOut('slow', function(c){
                    $('.cart-header').remove();
                    });
                    });
                    });
                </script>

                @foreach($cartProducts as $cartProduct)


                <div class="cart-header">

                    <div class="close1"> </div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <img src="{{asset($cartProduct->options->image)}}" class="img-responsive" alt="">
                        </div>
                        <div class="cart-item-info">
                            <h3><a href="#"> {{$cartProduct->name}}</a><span style="font-size: 20px">Quantity: {{$cartProduct->qty}}</span></h3>
                            <ul class="qty">
                                <li><p style="font-size: 30px">Price TK. {{$cartProduct->price}}</p></li>
                                <li><p style="font-size: 30px">Total TK. {{$cartProduct->subtotal}}</p></li>
                            </ul>
                            <div class="delivery">
                                <p>Service Charges : $10.00</p>
                                <span>Delivered in 1-1:30 hours</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                    @endforeach


            </div>
        </div>
        <!-- checkout -->
    </div>

    <script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>
    <script>

        $(".deleteRecord").click(function(){
            event.preventDefault();
            var d=2
            var id = $('.qty').val();
            $.ajax(
                {
                    url: 'http://localhost:8076/new-shop/public//cart/delete-cart-item/'+id,
                    method: 'get',
                    data: {
                        "id": id
                    },
                    success: function (data){
                        $('.qty').val(data)
                    }
                });

        });
    </script>

    @endsection