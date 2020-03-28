@extends('layouts.admin')


@section('content')
    <h1>Undelivered Orders</h1>
    @if(Session::has('order_updated'))

        <p class="bg-success">{{session('order_updated')}}</p>
    @endif
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">View Order</th>
            <th scope="col">Mark As</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
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
                    <td>{{ $order->address }}</td>
                    <td><a href="/admin/orders/{{$order->id}}" class="btn btn-success">View Order</a></td>
                    {!! Form::model($order, ['method'=>'PATCH', 'action'=>['OrderController@update', $order->id]]) !!}
                        <td>
                            <div class="form-group">
                                {!! Form::submit( $order->is_delivered  ? "Un Delivered" : "Delivered", ['class'=> 'btn btn-info']) !!}
                            </div>
                        </td>

                    {!! Form::close() !!}
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
