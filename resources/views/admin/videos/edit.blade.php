@extends('layouts.admin')

@section('content')
    <h1>VIDEOS</h1>


    <div class="col-sm-6">
        <h3>Edit Video</h3>


        {!! Form::model($video, ['method'=>'PATCH', 'action'=>['VideoCategoryController@update', $video->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('video_category_id', 'Video Category:') !!}
            {!! Form::select('video_category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('link', 'Link:') !!}
            {!! Form::text('link', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    <div class="col-sm-6">
    </div>

@endsection
