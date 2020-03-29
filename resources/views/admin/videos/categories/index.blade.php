@extends('layouts.admin')

@section('content')
    <h1>VIDEO CATEGORIES</h1>


    <div class="col-sm-6">
        <h3>Create Category</h3>


        {!! Form::open(['method'=>'POST', 'action'=>'VideoCategoryController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=> 'btn btn-primary']) !!}
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

            @if($categories)

                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'NOT PROVIDED'}}</td>
                        <td><a href="/admin/videos/categories/{{$category->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['VideoCategoryController@destroy', $category->id]]) !!}

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
