@extends('layouts.admin')

@section('content')
    <h1>PRODUCT GOALS</h1>


    <div class="col-sm-6">
        <h3>Create Product Goals</h3>


        {!! Form::open(['method'=>'POST', 'action'=>'AdminProductGoalsController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Product Goal', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-sm-6">


        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
            </thead>
            <tbody>

            @if($product_goals)

                @foreach($product_goals as $product_goal)
                    <tr>
                        <th scope="row">{{$product_goal->id}}</th>
                        <td>{{$product_goal->name}}</td>
                        <td>{{$product_goal->created_at ? $product_goal->created_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td>{{$product_goal->updated_at ? $product_goal->updated_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td><a href="/admin/product_goals/{{$product_goal->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductGoalsController@destroy', $product_goal->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=> 'btn btn-outline-danger']) !!}
                            </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </div>

@stop
