<div class="col-md-3">

    <!-- Product Search Well -->
    <div class="well">
        <h4>Product Search</h4>
        <div class="input-group">
                {!! Form::open(['method'=>'GET', 'action'=>'HomeController@search']) !!}
            
                    <input type="text" class="form-control" name="searchTerm" placeholder="Search Product" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                {!! Form::close() !!}
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Product Categories Well -->
    @if($categories)
        <div class="well">
            <h4>Product Categories</h4>
            <div class="row">
                
                    @foreach($categories as $category)
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><a href="#">{{$category->name}}</a></li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    @endforeach
            </div>
            <!-- /.row -->
        </div>
            <!-- /.well -->
    @endif

</div>
