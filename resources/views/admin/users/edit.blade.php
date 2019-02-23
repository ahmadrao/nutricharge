@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('photo_id', 'Your Image:') !!}
            <img height="70px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-9">
        <div class="row form-group">
            {!! Form::label('name', 'Name:') !!}
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                   value="{{ old('name', $user->name) }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="row form-group">
            {!! Form::label('email', 'Email:') !!}
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="row form-group">
            {!! Form::label('password', 'Password:') !!}
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="row form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="row form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(0=>'Not Active', 1=>'Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="row form-group">
            {!! Form::submit('Create User', ['class'=> 'btn btn-primary col-md-2']) !!}
        </div>

    </div>


    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

        <div class="row pull-right form-group">
            {!! Form::submit('Delete User', ['class'=> 'btn btn-danger mb-141']) !!}
        </div>

    {!! Form::close() !!}
    {{--@include('includes/form_error')--}}
@endsection




