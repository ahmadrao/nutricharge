@extends('layouts.admin')


@section('content')
    <a href="/admin/orders" class="btn btn-primary" style="margin-top: 6px;">Back to All Orders</a>
    <h1> {{ $order->product->title }} Order</h1>
    
    <h2>Buyer Name:</h2>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->name }}</h4>
    <h2>Buyer Email:</h2>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->email }}</h4> 
    <h2>Product Price:</h2> 
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->product->price }}</h4>  
    <h2>Buyer Phone Number:</h2>           
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->phone_number }}</h4>
    <h2>Buyer Address:</h2>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $order->address }}</h4>
    <h2>Order was Created At:</h2>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$order->created_at->diffForHumans()}}</h4>
                    

@endsection
