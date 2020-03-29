<!-- Header -->
@include('includes.front.header')

<body>

<!-- Navigation -->
@include('includes.front.home_nav')


<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-12" >
            <img src="{{ asset('images/geometic-bg-white.jpg')}}" alt="{{ $category_name }}" class="img-responsive">
            <div class="carousel-caption">
                <h1>{{ $category_name}}</h1>
            </div>
        </div>
        @if($videos) 
            @foreach($videos as $video)
                <div class="col-md-6">
                    <h2>{{ $video->name }}</h2>
                    <iframe width="100%" height="100%" src="{{ $video->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                </div>
            @endforeach
        @endif
        
    </div>
    <!-- /.row -->

    <hr>


    <!-- Footer -->
    @include('includes.front.footer')

</div>
<!-- /.container -->


<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>





</body>

</html>
