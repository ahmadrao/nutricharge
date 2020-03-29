@extends('layouts.admin')

@section('content')
    <h1>VIDEO CATEGORIES</h1>


    <div class="col-sm-6">
        <h3>Update Category</h3>


        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['VideoCategoryController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-sm-6">
    </div>

@endsection
