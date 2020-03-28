@extends('layouts.admin')

@section('content')
    <h1>PRODUCT GOALS</h1>


    <div class="col-sm-6">
        <h3>Update Product Goals</h3>


        {!! Form::model($product_goal, ['method'=>'PATCH', 'action'=>['AdminProductGoalsController@update', $product_goal->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Product Goal', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-sm-6">
    </div>

@endsection
