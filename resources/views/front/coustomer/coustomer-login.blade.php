@extends('front.master')
@section('title')
    Checkout
@endsection

@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form class="col-md-12" action="{{'new-coustomer-login'}}" method="post">
                    @csrf
                    <div class="well" style="margin-top: 30px">
                        <span class="text-warning">{{Session::get('message')}}</span>
                        <h4 class="text-center text-success" style="margin-bottom: 20px">Login Form</h4>
                        <div class="form-group row">
                            <label class="col-md-3" for="email">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="password">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" type="password" id="password" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for=""></label>
                            <div class="col-md-5">
                                <input class="btn btn-block btn-success" type="submit" name="login" value="Login">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
