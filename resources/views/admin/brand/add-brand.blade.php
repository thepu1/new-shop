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
                            {{Form::open(['url' => 'add-brand'])}}
                            {{Form::text('drand_name','',['class' =>  'form-control'])}}

                            {{Form::close()}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection