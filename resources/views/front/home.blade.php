<!-- Header -->
@include('includes.front.header')

<body>

<!-- Navigation -->
@include('includes.front.home_nav')


<!-- Page Content -->
<div class="container">

    <!-- Find Your Nutricharge Section -->
    {{-- <div class="row">
        <h3>Find Your Nutricharge:</h3>
        <div class="col-md-3 form-group">
            <label>Select Gender</label>
            <select class="form-control" name="gender" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>=
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label>Select Age Group</label>
            <select class="form-control" name="age_range" id="search-goal">
                <option value="2-6 years">2-6 Years</option>
                <option value="below 13 years">Below 13 Years</option>
                <option value="13 years and above">13 Years and Above</option>
                <option value="18 years and above">18 Years and Above</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label>Select Your Goal</label>
            <select class="form-control">
                <option>Brain Organ Development</option>
                <option>Female</option>
            </select>
        </div>
        <div class="col-md-3" style="margin-top: 24px;">
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success">Go</button>
            </div>
        </div>
        

    </div> --}}

    <!--  Slider -->
    @include('includes.front.slider')

    <div class="row">

        <h1>Nutricharge Products</h1>


        <!--  Products  -->
        @if($products)
            @foreach($products as $product)
                <a href="/product/{{$product->slug}}">
                    <div class="col-md-3 text-center" >
                        
                        
                        <img class="img-responsive" style="margin-left: auto; margin-right: auto;" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}" alt="">
                        <h4>
                            {{$product->title}}
                        </h4>
                        <p>Rs. {{ $product->price }}</p>

                    </div>
                </a>
            @endforeach
        @else
            <h2>No Products</h2>
    @endif
    <!-- Pagination -->




    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    {{-- 

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            
            {{$products->render()}}
        </div>
    </div> --}}

    <!-- Footer -->
    @include('includes.front.footer')

</div>
<!-- /.container -->


<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


<script>

    // $('#search-goal').on('change', function(e) {
    //     console.log(e);
    //     var age_range = e.target.value;
        
    //     console.log(age_range);
    // })


</script>


</body>

</html>
