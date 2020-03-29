<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
    </div>
    <!-- /.navbar-header -->



    <ul class="nav navbar-top-links navbar-right">


        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down">



                </i>
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







    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-users"></i>&nbsp;Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/users">All Users</a>
                        </li>

                        <li>
                            <a href="/admin/users/create">Create User</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Products<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/products">All Products</a>
                        </li>

                        <li>
                            <a href="/admin/products/create">Create Product</a>
                        </li>

                        <li>
                            <a href="/admin/reviews">All Reviews</a>
                        </li>
                        
                        <li>
                            <a href="/admin/product_goals">Product Goals</a>
                        </li>

                        

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href="/admin/categories"><i class="fa fa-list-alt fa-fw"></i>&nbsp;Categories</span></a>
                    
                </li>


                <li>
                    <a href="#"><i class="fa fa-image fa-fw"></i>&nbsp;Media<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/media">All Media</a>
                        </li>

                        <li>
                            <a href="/admin/media/create">Upload Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
                <!-- Videos -->
                <li>
                    <a href="#"><i class="fa fa-file-video-o fa-fw"></i>&nbsp;Videos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/videos">All Videos</a>
                        </li>

                        <li>
                            <a href="/admin/videos/create">Create Video</a>
                        </li>
                        
                        <li>
                            <a href="/admin/videos/categories">Video Categories</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-truck fa-fw"></i>&nbsp;Orders<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/orders">Undelivered Orders</a>
                        </li>

                        <li>
                            <a href="/admin/orders/delivered">Delivered Orders</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="/admin/contacts"><i class="fa fa-phone fa-fw"></i>&nbsp;Contacts</a>
                </li>

            </ul>


        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
