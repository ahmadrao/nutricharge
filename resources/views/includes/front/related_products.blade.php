<div class="row">

   <h2>Related Products</h2>

    @if(isset($related_products))
        @foreach($related_products as $product)
            <div class="col-md-4 text-center">
                <a href="/product/{{$product->slug}}" style="color: inherit;">
                    <figure class="card card-product">
                        <div class="img-wrap"> 
                            <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}">
                        </div>
                        <figcaption class="info-wrap">
                            <h6 class="title text-dots">{{$product->title}}</h6>
                            <div class="action-wrap">
                                <div class="price-wrap h5">
                                    <span class="price-new">Rs. {{ $product->price }}</span>
                                    <span class="">
                                        @if($product->getStarRating())
                                            @for ($i=1; $i <= 5 ; $i++)
                                                <span class="glyphicon glyphicon-star{{ ($i <= $product->getStarRating()) ? '' : '-empty'}}"></span>
                                            @endfor
                                        @endif
                                    </span>
                                </div> 
                            </div> <!-- action-wrap -->
                        </figcaption>
                    </figure> <!-- card // -->
                </a>

            </div>
        @endforeach
    @endif

</div>