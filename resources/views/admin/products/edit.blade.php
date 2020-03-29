@extends('layouts.admin')

@section('content')

    @include('includes.admin.tinyeditor')

    <h1>Edit Product</h1>
    <div class="row">
        @include('includes.form_error')

        {!! Form::model($product, ['method'=>'PATCH', 'action'=>['AdminProductsController@update', $product->id], 'files'=>true]) !!}

        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('photo_id', 'Product Image:') !!}
                <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="col-md-9">
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
                    <input type="checkbox" name="gender[]" value="male" {{in_array("male", $gender)?"checked":""}} class="form-check-input">
                    <label class="form-check-label" for="male">Male</label><br>
                </div>
                <div class="form-check col-md-6">
                    <input type="checkbox" name="gender[]" value="female" {{in_array("female", $gender)?"checked":""}} class="form-check-input">
                    <label class="form-check-label" for="female">Female</label><br>
                </div>
            </div>

        {{-- Checkboxes for Age Range --}}
        <div class="form-group">
            {!! Form::label('age_range[]', 'Age Range:') !!} <br>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="2-6 years" {{in_array("2-6 years", $age_range)?"checked":""}} class="form-check-input">
                <label class="form-check-label" for="2-6 years">2-6 Years</label><br>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="below 13 years" {{in_array("below 13 years", $age_range)?"checked":""}} class="form-check-input">
                <label class="form-check-label" for="below 13 years">Below 13 years</label><br>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="13 years and above" {{in_array("13 years and above", $age_range)?"checked":""}} class="form-check-input">
                <label class="form-check-label" for="13 years and above">13 Years and Above</label><br>
            </div>
            <div class="form-check col-md-6">
                <input type="checkbox" name="age_range[]" value="18 years and above" {{in_array("18 years and above", $age_range)?"checked":""}} class="form-check-input">
                <label class="form-check-label" for="18 years and above">18 Years and Above</label><br>
            </div>
        </div>
        
        
        {{-- Checkboxes for Goals --}}
        <div class="form-group">
            {!! Form::label('selected_product_goals[]', 'Product Goals:') !!} <br>
            @if($product_goals)

                @foreach($product_goals as $product_goal)
                    <div class="form-check col-md-6">
                        <input type="checkbox" name="selected_product_goals[]" value="{{ $product_goal->name }}" {{in_array($product_goal->name, $selected_product_goals)?"checked":""}} class="form-check-input">
                        <label class="form-check-label" for="{{ $product_goal->name }}">{{ $product_goal->name }}</label><br>
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
                {!! Form::submit('Update Product', ['class'=> 'btn btn-success col-md-6']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductsController@destroy', $product->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Product', ['class'=> 'btn btn-danger col-md-6']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop
