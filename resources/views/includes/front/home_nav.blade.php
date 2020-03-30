<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding: 2px 2px;" href="/">
                <img src="{{ asset('images/Nutricharge-New-Logo.gif') }}" class="img-responsive" style="max-height: 96% !important;">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Videos
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if($video_categories)
                            @foreach($video_categories as $category)
                                <li><a href="/videos/{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                        
                    </ul>
                </li>
                <li><a href="/contact-us">Contact Us</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/frequently-asked-questions">FAQs</a></li>
                @if(Auth::guest())
                    
                @else
                    <li><a href="/admin">Admin</a></li>

                    <li>
                        <ul class="nav navbar-top-links navbar-right">
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="/admin/users/{{Auth::user()->id}}/edit"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                            <!-- /.dropdown -->


                        </ul>
                    </li>
                @endif
            </ul>
            {!! Form::open(['method'=>'GET', 'action'=>'HomeController@search', 'class'=>'form-inline my-lg-0', 'style'=>'margin-top: 10px;']) !!}
                <input class="form-control mr-sm-2" type="search"  name="searchTerm" placeholder="Search Product" value="{{ isset($searchTerm) ? $searchTerm : '' }}" aria-label="Search">
                <button class="btn btn-outline-success my-sm-0" type="submit">Search</button>
            {!! Form::close() !!}
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
