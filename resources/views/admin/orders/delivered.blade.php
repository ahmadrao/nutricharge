@extends('layouts.admin')


@section('content')
    <a href="/admin/orders" class="btn btn-primary" style="margin-top: 6px;">Back to All Orders</a>
    <h1>Delivered Orders</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Email</th>
            <th scope="col">Price</th>
            <th scope="col">View Order</th>
            <th scope="col">Created At</th>
            <th scope="col">Delivered At</th>
        </tr>
        </thead>

        @if($orders)

            @foreach($orders as $order)
                <tbody>
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td> {{ $order->product->title }} </td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td><a href="/admin/orders/{{$order->id}}" class="btn btn-success">View Order</a></td>
                    <td>{{$order->created_at->diffForHumans()}}</td>
                    <td>{{$order->updated_at->diffForHumans()}}</td>
                </tr>

                </tbody>
            @endforeach
        @endif
    </table>
    {{-- <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            {{$orders->render()}}
        </div>
    </div> --}}

@stop
