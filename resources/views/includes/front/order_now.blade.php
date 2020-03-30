<div class="col-md-6">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
        <!-- Button to Open the Modal -->
        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#orderModal">
            Order Now
        </button>
    </div>
</div>




<!-- The Modal -->
<div class="modal fade" id="orderModal">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Now</h4>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                {!! Form::open(['method'=>'POST', 'action'=>'HomeController@store', $product->id]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => '*Enter Your Full Name']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email',  null, ['class'=>'form-control', 'placeholder' => '*Enter Your Email Address']) !!}
                    </div>

                                            
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number:') !!}
                        {!! Form::number('phone_number', null, ['class'=>'form-control', 'placeholder' => '*Enter Your Phone Number']) !!}
                    </div>

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group">
                        {!! Form::label('address', 'Address:') !!}
                        {!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder' => '*Enter Your Full Address']) !!}
                    </div>

                    <div class="modal-footer">
                        {!! Form::submit('Submit Order', ['class'=> 'btn btn-success']) !!}
                    </div>

                {!! Form::close() !!}
            </div>     
        </div>
    </div>
</div>
