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
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->category_description}}</td>
                                        <td>{{$category->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            @if($category->publication_status == 1)
                                            <a href="{{route('published',$category->id)}}" class="btn btn-info">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>

                                            @else
                                                <a href="{{route('unpublished',$category->id)}}" class="btn btn-warning">
                                                    <i class="fas fa-arrow-down"></i>
                                                </a>
                                            @endif

                                            <a class="btn btn-success" href="{{route('edit-category',$category->id)}}"><i class="fas fa-edit"></i></a>

                                            <a class="btn btn-danger" href="{{route('delete-category',$category->id)}}" onclick="event.preventDefault();
                                            var check = confirm('are you sure');
                                            if(check){
                                            document.getElementById('{{$category->id}}').submit();
                                            }
                                             ">
                                                <i class="fas fa-trash-alt"></i></a>
                                            <form action="{{route('delete-category')}}" id="{{$category->id}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$category->id}}">
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