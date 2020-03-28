
<button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#expandForm" aria-expanded="false" aria-controls="expandForm">
    Order Now
</button>

<div class="collapse" id="expandForm">
    <div class="card card-body">
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

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=> 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>