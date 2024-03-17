@extends('master')
@section('title','Manage Page')
@section('body')
    <section class="py-5 bg-primary-subtle">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header text-center"><h2>Manage Page</h2></div>
                        <span class="text-danger text-end">{{session('message')}}</span>
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($products as $product)
                                <tbody>
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt=""height="50" width="70">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('product_manage_edit',['id'=>$product->id])}}" class="btn btn-success btn-sm me-2">Edit</a>
                                        <form action="{{route('product.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="id">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
