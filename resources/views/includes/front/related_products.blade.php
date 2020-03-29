<div class="row">

    @if(isset($related_products))
        @foreach($related_products as $product)
            <div class="col-md-4 text-center">

                <img class="img-responsive" style="margin-left: auto; margin-right: auto;" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}" alt="">
                <!-- Title -->
                <h4>{{$product->title}}</h4>
                @if($product->getStarRating())
                    @for ($i=1; $i <= 5 ; $i++)
                        <span class="glyphicon glyphicon-star{{ ($i <= $product->getStarRating()) ? '' : '-empty'}}"></span>
                    @endfor
                @endif
                <!-- Product Price -->
                <h3>Rs. {{ $product->price }}</h3>

            </div>
        @endforeach
    @endif

</div>