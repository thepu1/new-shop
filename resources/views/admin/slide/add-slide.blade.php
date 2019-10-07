@extends('admin.master')
@section('title')
    Add Slide
@endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <form action="{{route('new-slide')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card my-5">
                        <div class="card-header text-center text-success">Add Slide Form</div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="slide_title" class="col-md-3">Slide Title :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="slide_title" id="slide_title">
                                    <span class="text-center text-danger">{{$errors->has('slide_title') ? $errors->first('slide_title') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slide_image" class="col-md-3">Slide Image :</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="slide_image" id="slide_image">
                                    <span class="text-center text-danger">{{$errors->has('slide_image') ? $errors->first('slide_image') : ''}}</span>
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
                                    <input type="submit" class="btn btn-success btn-block" value="Add Slide Info">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection