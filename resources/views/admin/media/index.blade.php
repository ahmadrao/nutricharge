@extends('layouts.admin')


@section('content')
    <h1>Media</h1>

    @if(Session::has('photo_deleted'))
        <p class="bg-danger">{{session('photo_deleted')}}</p>
    @endif





    @if($photos)


        <form action="/admin/delete/media" method="get" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary">
            </div>


            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="options"></th>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Delete Photo</th>

                </tr>
                </thead>
                <tbody>


                @foreach($photos as $photo)
                    <tr>
                        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}">
                        </td>
                        <th scope="row">{{$photo->id}}</th>
                        <td><img height="70px" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}"
                                 alt="">
                        </td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'NO DATE'}}</td>
                        <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'NO DATE'}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('DELETE', ['class'=> 'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @else
                <h1>NO MEDIA FILES</h1>


            @endif

        </form>
@endsection

@section('scripts')

    <script>
    $(document).ready(function(){

        $('#options').click(function () {

            if(this.checked){
                $('.checkBoxes').each(function () {
                    this.checked = true;
                });
            }else {
                $('.checkBoxes').each(function () {
                    this.checked = false;
                });
            }
        });

    });
    </script>

@endsection


