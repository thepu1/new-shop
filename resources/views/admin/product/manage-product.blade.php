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
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>publication Status</th>
                            <th width="150">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td><img src="{{asset($product->product_image)}}" alt="" width="60" height="40"></td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    @if($product->publication_status == 1)
                                        <a href="{{route('published-product',$product->id)}}" class="btn btn-info">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>

                                    @else
                                        <a href="{{route('unpublished-product',$product->id)}}" class="btn btn-warning">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif

                                    <a class="btn btn-success" href="{{route('edit-product',$product->id)}}"><span><i class="fas fa-edit"></i></span></a>

                                    <a class="btn btn-danger" href="{{route('delete-product',$product->id)}}" onclick="event.preventDefault();
                                    var check = confirm('are you sure');
                                    if (check){
                                    document.getElementById('{{$product->id}}').submit();
                                    }
                                        ">
                                        <i class="fas fa-trash-alt"></i></a>
                                        <form id="{{$product->id}}" action="{{route('delete-product')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="id">
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



@endsection
