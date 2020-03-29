@extends('layouts.admin')

@section('content')
    <h1>VIDEOS</h1>

    <!-- Create Video -->
    <div class="col-sm-6">
        <h3>Create Video</h3>


        {!! Form::open(['method'=>'POST', 'action'=>'VideoController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('video_category_id', 'Video Category:') !!}
            {!! Form::select('video_category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('link', 'Youtube Video Iframe Link:') !!}
            {!! Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Enter Youtube Video Iframe Link i.e youtube.com/embed/akdjfW89']) !!}
        </div>

        

        <div class="form-group">
            {!! Form::submit('Create Video', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


    <!-- Show All Videos -->
    <div class="col-sm-6">


        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
            </tr>
            </thead>
            <tbody>

            @if($videos)

                @foreach($videos as $video)
                    <tr>
                        <th scope="row">{{$video->id}}</th>
                        <td>{{$video->name}}</td>
                        <td>{{$video->category->name}}</td>
                        <td>{{$video->created_at ? $video->created_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td>{{$video->updated_at ? $video->updated_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td><a href="/admin/videos/{{$video->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['VideoCategoryController@destroy', $video->id]]) !!}

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
