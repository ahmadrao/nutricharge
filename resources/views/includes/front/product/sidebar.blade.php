<div class="col-md-3">


    <!-- Product Related Videos -->
    @if(isset($related_videos))
            <h2>Product Videos</h2>
            <div class="row">

                @foreach($related_videos as $video)
                    <div class="col-md-12">
                        <iframe width="100%" height="100%" src="{{ $video->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>
                @endforeach
            </div>
            <!-- /.row -->
    @endif

    <!--Sidebar Product -->
    @include('includes.front.product.sidebar_products')

</div>
