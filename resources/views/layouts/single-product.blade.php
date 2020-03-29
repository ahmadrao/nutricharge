<!-- Header -->
@include('includes.front.header')


<body>

<!-- Navigation -->
@include('includes.front.home_nav')

<!-- Page Content -->
<div class="container" id="app">

    <div class="row">

        <!--  Post Content Column -->
        <div class="col-md-8">

            <!--  Post -->

            @yield('content')
            

        </div>
        
        

        <!--  Sidebar Widgets Column -->
        @include('includes.front.home_sidebar')


    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    @include('includes.front.footer')
    

</div>
<!-- /.container -->


<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')


</body>

</html>
