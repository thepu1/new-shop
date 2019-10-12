@extends('front.master')
@section('title')
    @endsection
@section('body')
    <div class="container">
        <row>
            <div class="col-md-12">
                <div class="well">
                    <h4 class="text-center text-success">Dear {{Session::get('coustomerName')}}. You have to give us product info to complete your valuable order. If your biling Info and shipping info are same  then just press on save shipping info button</h4>
                </div>
            </div>
        </row>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <form class="col-md-12"  action="{{route('new-shipping')}}" method="post">
                        @csrf
                        <div class="well">
                            <h4 class="text-center text-success" style="margin-bottom: 20px">Shipping Info goes here...</h4>
                            <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                            <div class="form-group row">
                                <label class="col-md-3" for="full_name">Full Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="first_name" name="full_name" value="{{$coustomer->first_name.' '.$coustomer->last_name}}">
                                    <span class="text-center text-danger">{{$errors->has('first_name') ? $errors->first('first_name'):''}}</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3" for="email">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" id="email" name="email" value="{{$coustomer->email}}">
                                    <span class="text-center text-danger">{{$errors->has('email') ? $errors->first('email'):''}}</span>
                                    <span id="email_errors" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for="phone">Phone</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{$coustomer->phone}}">
                                    <span class="text-center text-danger">{{$errors->has('phone') ? $errors->first('phone'):''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for="address">Address</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="address" name="address" value="{{$coustomer->address}}">
                                    <span class="text-center text-danger">{{$errors->has('address') ? $errors->first('address'):''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-5">
                                    <input class="btn btn-success btn-block" id="register_btn" type="submit"name="btn" value="Save Shipping Info">
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection