@extends('layouts.admin')

@section('content')

    @if($reviews)
        <h1>Reviews</h1>
        @if(Session::has('review_deleted'))
            <p class="bg-danger">{{session('review_deleted')}}</p>
        @endif
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">View Product</th>
                <th scope="col">View Replies</th>
                <th scope="col">Action</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <th scope="row">{{$review->id}}</th>
                    <td>{{$review->author}}</td>
                    <td>{{$review->email}}</td>
                    <td>{{$review->description}}</td>
                    <td><a href="/products/{{$review->product_id}}" class="btn btn-outline-info">View Product</a></td>
                    <td><a href="/admin/review/replies/{{$review->id}}" class="btn btn-outline-primary">View Replies</a></td>
                    <td>
                        @if($review->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['ProductReviewsController@update', $review->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve', ['class'=> 'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['ProductReviewsController@update', $review->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=> 'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['ProductReviewsController@destroy', $review->id]]) !!}


                        <div class="form-group">
                            {!! Form::submit('DELETE', ['class'=> 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <h1>No Reviews</h1>
    @endif

@endsection
