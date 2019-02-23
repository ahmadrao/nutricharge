@extends('layouts.admin')


@section('content')
    <h1>Create User</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('photo_id', 'Select Your Image:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-8">
        <div class="row form-group">
            {!! Form::label('name', 'Name:') !!}
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                   value="{{ old('name') }}" required autofocus>

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
            {!! Form::select('role_id', [''=>'Choose Options']+ $roles, 0, ['class'=>'form-control']) !!}
        </div>

        <div class="row form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(0=>'Not Active', 1=>'Active'), 0, ['class'=>'form-control']) !!}
        </div>

        <div class="pull-left form-group">
            {!! Form::submit('Create User', ['class'=> 'btn btn-primary']) !!}
        </div>

    </div>


    {!! Form::close() !!}
    {{--@include('includes/form_error')--}}
@endsection




