@extends('layouts.admin')

@section('content')
    @include('includes.admin.tinyeditor')

    <h1>Create Product</h1>
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminProductsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('video_category_id', 'Video Category:') !!}
            {!! Form::select('video_category_id', $video_categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Product Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('pic_id', 'Index Pic:') !!}
            {!! Form::file('pic_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('related_pics_ids', 'Related Pics:') !!}
            {!! Form::text('related_pics_ids', null, ['class'=>'form-control', 'placeholder' => 'Enter More than one Pic IDs by separating them with a ,']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('related_video_links', 'Related Videos:') !!}
            {!! Form::text('related_video_links', null, ['class'=>'form-control', 'placeholder' => 'Enter More than one Video Link by separating them with a ,']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::number('price', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender[]', 'Gender:') !!} <br>
            <div class="form-check col-md-6">
                <input type="checkbox" name="gender[]" value="male" class="form-check-input">
                <label class="form-check-label" for="male">Male</label><br>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="gender[]" value="female" class="form-check-input">
                <label class="form-check-label" for="female">Female</label><br>
            </div>
        </div>


        {{-- Checkboxes for Age Range --}}
        <div class="form-group">
            {!! Form::label('age_range[]', 'Age Range:') !!} <br>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="2-6 years" class="form-check-input">
                <label class="form-check-label" for="2-6 years">2-6 Years</label>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="below 13 years" class="form-check-input">
                <label class="form-check-label" for="below 13 years">Below 13 years</label>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="13 years and above" class="form-check-input">
                <label class="form-check-label" for="13 years and above">13 Years and Above</label>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="18 years and above" class="form-check-input">
                <label class="form-check-label" for="18 years and above">18 Years and Above</label>
            </div>
        </div>


        {{-- Checkboxes for Goals --}}
        <div class="form-group">
            {!! Form::label('selected_product_goals[]', 'Product Goals:') !!} <br>
            @if($product_goals)

                @foreach($product_goals as $product_goal)
                    <div class="form-check col-md-6">
                        <input type="checkbox" name="selected_product_goals[]" value="{{ $product_goal->name }}" class="form-check-input">
                        <label class="form-check-label" for="{{ $product_goal->name }}">{{ $product_goal->name }}</label>
                    </div>
                @endforeach
            @endif
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="form-group">
            {!! Form::label('details', 'Details:') !!}
            {!! Form::textarea('details', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Product', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

        @include('includes.form_error')
@stop
