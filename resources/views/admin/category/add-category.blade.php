@extends('admin.master')
@section('title')
    Category
    @endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <form action="{{route('new-category')}}" method="post">
                    @csrf
                    <div class="card my-5">
                        <div class="card-header text-center text-success">Add Category Form</div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="category_name" class="col-md-3">Category Name :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="category_name" id="category_name">
                                    <span class="text-center text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_description" class="col-md-3">Category Description :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="category_description" id="category_description">
                                    <span class="text-center text-danger">{{$errors->has('category_description') ? $errors->first('category_description') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publication_status" class="col-md-3">Publication Status :</label>
                                <div class="col-md-9">
                                    <input type="radio" name="publication_status" value="1" id="publication_status">Published
                                    <input type="radio" name="publication_status" value="0" id="publication_status">Unublished <br>
                                    <span class="text-center text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3"></label>
                                <div class="col-md-5">
                                    <input type="submit" class="btn btn-success btn-block" value="Add Category Info">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection