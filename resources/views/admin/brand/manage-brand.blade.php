@extends('admin.master')
@section('title')
    Manage Category
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center text-success">Category Table</h6>
            </div>
            <div class="card-body">
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>{{$brand->brand_description}}</td>
                                <td>{{$brand->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($brand->publication_status == 1)
                                        <a href="{{route('published',$brand->id)}}" class="btn btn-info">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>

                                    @else
                                        <a href="{{route('unpublished',$brand->id)}}" class="btn btn-warning">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif

                                    <a class="btn btn-success" href="{{route('edit-brand',$brand->id)}}"><i class="fas fa-edit"></i></a>

                                    <a class="btn btn-danger" href="{{route('delete-brand',$brand->id)}}" onclick="event.preventDefault();
                                            var check = confirm('are you sure');
                                            if(check){
                                            document.getElementById('{{$brand->id}}').submit();
                                            }
                                            ">
                                        <i class="fas fa-trash-alt"></i></a>
                                    <form action="{{route('delete-brand')}}" id="{{$brand->id}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$brand->id}}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->



@endsection