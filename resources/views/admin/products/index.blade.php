@extends('layouts.admin')


@section('content')
    <h1>Products</h1>
    @if(Session::has('product_deleted'))

        <p class="bg-danger">{{session('product_deleted')}}</p>
    @endif
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">View Product</th>
            <th scope="col">Reviews</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>

        @if($products)

            @foreach($products as $product)
                <tbody>
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><a href="/admin/products/{{$product->id}}/edit"><img height="50px" src="{{$product->photo


                     ? $product->photo->file : 'http://placehold.it/400x400'}}" alt=""></a></td>
                    <td>{{$product->user->name}}</td>
                    <td>{{$product->category ? $product->category->name : "Undefined Category"}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{str_limit($product->body, 20)}}</td>
                    <td><a href="/products/{{$product->slug}}" class="btn btn-success">View Product</a></td>
                    <td><a href="/admin/reviews/{{$product->id}}" class="btn btn-info">Reviews</a></td>
                    <td>{{$product->created_at->diffForHumans()}}</td>
                    <td>{{$product->updated_at->diffForHumans()}}</td>
                </tr>

                </tbody>
            @endforeach
        @endif
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            {{$products->render()}}
        </div>
    </div>

@stop
