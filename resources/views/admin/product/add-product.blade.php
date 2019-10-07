@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="card my-5">
                    <div class="card-header text-center text-success">Add Product Form</div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <div class="card-body">
                        {{Form::open(['route' => 'new-product','method' => 'post','enctype' => 'multipart/form-data'])}}
                        <div class="form-group row">
                            <label class="col-md-3" for="category_name">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" id="category_name">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3" for="brand_name">Brand Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="brand_id" id="brand_name">
                                    @foreach($brands as $barnd)
                                    <option value="{{$barnd->id}}">{{$barnd->brand_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_name" class="col-md-3">Product Name :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="product_name" id="product_name">
                                <span class="text-center text-danger">{{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-3">Product Price :</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="product_price" id="product_price">
                                <span class="text-center text-danger">{{$errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-3">Product Tax :</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="product_tax" id="product_tax">
                                <span class="text-center text-danger">{{$errors->has('product_tax') ? $errors->first('product_tax') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_quantity" class="col-md-3">Product Quantity :</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="product_quantity" id="product_quantity">
                                <span class="text-center text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short_description" class="col-md-3">Short Description :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="short_description" id="short_description">
                                <span class="text-center text-danger">{{$errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="long_description" class="col-md-3">Long Description :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="long_description" id="long_description">
                                <span class="text-center text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_image" class="col-md-3">Product Image :</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="product_image" id="product_image">
                                <span class="text-center text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publication_status" class="col-md-3">Publication Status :</label>
                            <div class="col-md-9">
                                <input type="radio" name="publication_status" value="1" id="publication_status"> Published
                                <input type="radio" name="publication_status" value="0" id="publication_status"> Unublished <br>
                                <span class="text-center text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-success btn-block" value="Add Product Info">
                            </div>
                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection