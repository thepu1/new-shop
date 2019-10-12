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
                <form class="col-md-12"  action="{{route('new-coustomer-sign-up')}}" method="post">
                    @csrf
                    <div class="well" style="margin-top: 30px">
                        <h4 class="text-center text-success" style="margin-bottom: 20px">Registration Form</h4>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                        <div class="form-group row">
                            <label class="col-md-3" for="first_name">First Name</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="first_name" name="first_name">
                                <span class="text-center text-danger">{{$errors->has('first_name') ? $errors->first('first_name'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="last_name">Last Name</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="last_name" name="last_name">
                                <span class="text-center text-danger">{{$errors->has('last_name') ? $errors->first('last_name'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="email">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" type="email" id="email" name="email">
                                <span class="text-center text-danger">{{$errors->has('email') ? $errors->first('email'):''}}</span>
                                <span id="email_errors" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="password">Password</label>
                            <div class="col-md-9">
                                <input class="form-control" type="password" id="password" name="password">
                                <span class="text-center text-danger">{{$errors->has('password') ? $errors->first('password'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="phone">Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="phone" name="phone">
                                <span class="text-center text-danger">{{$errors->has('phone') ? $errors->first('phone'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for="address">Address</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="address" name="address">
                                <span class="text-center text-danger">{{$errors->has('address') ? $errors->first('address'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3" for=""></label>
                            <div class="col-md-5">
                                <input class="btn btn-success btn-block" id="register_btn" type="submit"name="btn" value="Registration">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>
    <script>
        var email = $('#email');
        email.blur(function () {
            var email= $('#email').val();
            var btn = $('#register_btn');
            $.ajax({
                url: 'http://localhost:8076/new-shop/public/email-check/'+email,
                method: 'get',
                success:function (data) {
                    $('#email_errors').html(data);
                    if (data=='Email Allready Exist') {
                        btn.attr('disabled',true);
                    }
                    else {
                        btn.attr('disabled',false);
                    }
                }
            })
        })
    </script>
@endsection
