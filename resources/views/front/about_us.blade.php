<!-- Header -->
@include('includes.front.header')


<body>

    <!-- Navigation -->
    @include('includes.front.home_nav')


    <!-- Page Content -->
    <div class="container">
        <div>
            <h2>About Us</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="lead">

                    “Trophic” is a Greek word meaning nutrition and our sole endeavour is to develop and promote world class nutritional & wellness products. We aspire to take nutrition to the higher levels of quality and effectiveness.

                </p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/trophic_logo.png') }}" alt="nutricharge trophic_logo" class="image-responsive" style="margin-left: auto; margin-right: auto;" >
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <p class="lead">
                    Trophic Wellness shall strive to be a high quality, nutritional and wellness products company offering a vast array of nutritional /dietary supplements of global standards, with proven efficacy to improve the daily lives of billions of people around the globe.

                    Nutricharge is a registered trade mark of Trophic Wellness and the brand promises high quality, potentially beneficial Nutritional supplements as also valuable insights to people for obtaining a balanced nutrition so as to stay healthy and fit.

                </p>
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <br><br><br>
        
         <!-- Footer -->
        @include('includes.front.footer')


    </div>
    <!-- /.container -->


    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>





</body>

</html>
