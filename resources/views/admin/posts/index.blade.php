@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
    @if(Session::has('post_deleted'))

        <p class="bg-danger">{{session('post_deleted')}}</p>
    @endif
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>

        @if($posts)

            @foreach($posts as $post)
                <tbody>
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td><a href="/admin/posts/{{$post->id}}/edit"><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></a></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : "Undefined Category"}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

                </tbody>
            @endforeach
        @endif
    </table>

@stop
