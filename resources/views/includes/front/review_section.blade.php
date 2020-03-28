<!-- Show Reviews -->
<div class="item-wrapper">
    <h1>Reviews</h1>
    <ul>
    @foreach($reviews as $review)
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <i class="fa fa-4x fa-user fa-fw pull-left"></i>
            </div>
        @for ($i=1; $i <= 5 ; $i++)
        <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
        @endfor

        {{ $review->author ? $review->author : 'Anonymous'}} 
        <br>
        <span class="pull-right">{{$product->created_at->diffForHumans()}}</span> 

        <p>{{{$review->description}}}</p>
        </div>
    </div>
    @endforeach
    </ul>

</div>


<!-- Submit a Review -->

<div class="item-wrapper">

    <br>

    <button class="btn btn-success btn-lg pull-right" type="button" data-toggle="collapse" data-target="#expandReviewForm" aria-expanded="false" aria-controls="expandReviewForm">
            Leave a Review
    </button>

    <div class="collapse" id="expandReviewForm">
    {!! Form::open(['method'=>'POST', 'action'=>'HomeController@review']) !!}
        <legend>Rate our product</legend>

        <div class="form-group">
            <label for="">Rate It</label>
            <input id="ratings-hidden" name="rating" type="hidden"> 
            <div class="stars starrr" data-rating="0"></div>
            
        </div>

        <div class="form-group">
            <label for="">Headline</label>
            <input
                type="text"
                class="form-control"
                name="headline"
                id=""
                placeholder="Give your Review a Headline"
            />
        </div>

        <div class="form-group">
            <label for="">Name</label>
            <input
                type="text"
                class="form-control"
                name="author""
                id=""
                placeholder="Your Name"
            />
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input
                type="text"
                class="form-control"
                name="email"
                id=""
                placeholder="Your Email"
            />
        </div>
        <input type="hidden" name="product_id" value="{{$product->id}}">

        <div class="form-group">

            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3, 'placeholder' => 'Write a Descriptive Review']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit Review', ['class'=> 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>