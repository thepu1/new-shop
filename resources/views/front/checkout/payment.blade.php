@extends('front.master')
@section('title')
@endsection
@section('body')
    <div class="container">
        <row>
            <div class="col-md-12">
                <div class="well">
                    <h4 class="text-center text-success">Dear {{Session::get('coustomerName')}}. You have to give us product payment method...</h4>
                </div>
            </div>
        </row>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="col-md-12" action="{{route('new-order')}}" method="post">
                    @csrf
                <div class="well">
                    <h4 class="text-center text-success" style="margin-bottom: 20px">Payment Form ......</h4>
                        <table class="table table-bordered text-left">
                            <tr>
                                <th>Cash On Delivery </th>
                                <td><input type="radio" name="payment_type" value="cash"> Cash On Delivery</td>
                            </tr>
                            <tr>
                                <th>Paypal </th>
                                <td><input type="radio" name="payment_type" value="paypal">Paypal</td>
                            </tr>
                            <tr>
                                <th>BKash </th>
                                <td><input type="radio" name="payment_type" value="bkash">Bkash</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" name="payment_btn" value="Confirm Order"></td>
                            </tr>
                        </table>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection