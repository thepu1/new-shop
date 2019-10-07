@extends('admin.master')
@section('title')
    Add Brand
@endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="card my-5">
                    <div class="card-header text-center text-success">Add Brand Form</div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <div class="card-body">
                        {{Form::open(['route' => 'update-brand','method' => 'post'])}}
                        <div class="form-group row">
                            <label for="brand_name" class="col-md-3">Brand Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="brand_name" id="brand_name" value="{{$brand->brand_name}}">
                                <input type="text" class="form-control" name="id"  value="{{$brand->id}}">
                                <span class="text-center text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_description" class="col-md-3">Brand Description :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="brand_description" id="brand_description" value="{{$brand->brand_description}}">
                                <span class="text-center text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publication_status" class="col-md-3">Publication Status :</label>
                            <div class="col-md-9">
                                <input type="radio" {{$brand->publication_status==1 ? 'checked' : ''}} name="publication_status" value="1" id="publication_status"> Published
                                <input type="radio" {{$brand->publication_status==0 ? 'checked' : ''}} name="publication_status" value="0" id="publication_status"> Unublished <br>
                                <span class="text-center text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-success btn-block" value="Update Brand Info">
                            </div>
                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection