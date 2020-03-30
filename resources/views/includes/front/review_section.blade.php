<!-- Show Reviews -->
<div class="item-wrapper">
    <h1>Reviews</h1>
    <!-- Submit a Review -->

    <button class="btn btn-success btn-lg pull-right" style="margin-top: -50px;"  data-toggle="modal" data-target="#reviewModal">
            Leave a Review
    </button>

    <!-- The Modal -->
<div class="modal fade" id="reviewModal">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Review</h4>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'HomeController@review']) !!}

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

                    <div class="modal-footer">
                        {!! Form::submit('Submit Review', ['class'=> 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>     
        </div>
    </div>
</div>




    <!-- Show Reviews -->
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
                <span class="pull-right">{{$review->created_at->diffForHumans()}}</span> 

                <p>{{{$review->description}}}</p>
                </div>
            </div>
        @endforeach
    </ul>

</div>


