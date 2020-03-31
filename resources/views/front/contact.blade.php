<!-- Header -->
@include('includes.front.header')


<body>

    <!-- Navigation -->
    @include('includes.front.home_nav')


    <!-- Page Content -->
    <div class="container">
        <div class="row text-center">
            <h2>Contact Us</h2>
            <p>Swing by for a cup of coffee, or leave us a message:</p>
        </div>

        {!! Form::open(['method'=>'POST', 'action'=>'HomeController@submitContactPage']) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_name">Name *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your Name *" required="required">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email">Email *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required">

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_address">Address *</label>
                        <input id="form_address" type="text" name="address" class="form-control" placeholder="Please enter your Address *" required="required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message">Message *</label>
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"></textarea>

                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send" value="Send message">
                </div>
    {!! Form::close() !!}




    </div>
    <!-- /.container -->
    <br><br><br>

    <!-- Footer -->
    @include('includes.front.footer')


    @include('includes.front.scripts')





</body>

</html>
