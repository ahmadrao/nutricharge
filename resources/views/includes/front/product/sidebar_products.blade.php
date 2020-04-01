@if(isset($sidebar_products))
    <h2>Products </h2>
    @foreach($sidebar_products as $product)
        <div class="col-md-12">
            <a href="/products/{{$product->slug}}" style="color: inherit;">
                <div class="col-md-6">
                    <!-- Title -->
                    <h4 style="margin-left: -28px;">{{$product->title}}</h4>
                    <!-- Product Price -->
                    <h5 style="margin-left: -27px;">Rs. {{ $product->price }}</h5>



                </div>

                <div class="col-md-6">

                    <img class="img-responsive" style="margin-left: auto; margin-right: auto;" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}" alt="">

                </div>
            </a>
        </div>
    @endforeach
@endif
