@if(isset($sidebar_products))
    <h2>Products </h2>
    @foreach($sidebar_products as $product)
        <div class="col-md-12">
            <a href="/product/{{$product->slug}}">
                <div class="col-md-6">
                    <!-- Title -->
                    <h5>{{$product->title}}</h5>
                    @if($product->getStarRating())
                        @for ($i=1; $i <= 5 ; $i++)
                            <span class="glyphicon glyphicon-star{{ ($i <= $product->getStarRating()) ? '' : '-empty'}}"></span>
                        @endfor
                    @endif
                    <!-- Product Price -->
                    <h5>Rs. {{ $product->price }}</h5>

                </div>

                <div class="col-md-6">

                    <img class="img-responsive" style="margin-left: auto; margin-right: auto;" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}" alt="">

                </div>
            </a>
        </div>
    @endforeach
@endif
