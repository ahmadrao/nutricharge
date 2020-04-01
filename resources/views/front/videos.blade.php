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

                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                            </div>

                        </div><!-- card image -->

                        <div class="card-content">
                            <span class="card-title">{{ $video->name }}</span>

                        </div><!-- card content -->


                    </div>
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
