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
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-7">
                <div class="well">
                    <h4 class="text-center text-success" style="margin-bottom: 20px">Registration Form</h4>
                    <div class="well-header">
                        <div class="well-body">
                            <form action="" method="post">
                                @csrf
                            <div class="form-group row">
                                <label class="col-md-3" for="first_name">First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="last_name">Last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="last_name" name="last_name">
                                </div>
                            </div>

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
                                <label class="col-md-3" for="phone">Phone</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="phone" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for="address">Address</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="address" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-5">
                                    <input class="btn btn-success btn-block" type="submit"name="btn" value="Registration">
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="well">
                    <h4 class="text-center text-success" style="margin-bottom: 20px">Registration Form</h4>
                    <div class="well-header">
                        <div class="well-body">
                            <form action="" method="post">
                                @csrf
                            <div class="form-group row">
                                <label class="col-md-3" for="email">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" id="email" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for="passwrod">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="passwrod" id="passwrod" name="passwrod">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-5">
                                    <input class="btn btn-block btn-success" type="submit" name="btn" value="Login">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection