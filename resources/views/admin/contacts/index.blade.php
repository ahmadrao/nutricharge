@extends('layouts.admin')


@section('content')
    <h1>Contacts</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Message</th>
            <th scope="col">Submitted</th>
        </tr>
        </thead>

        @if($contacts)

            @foreach($contacts as $contact)
                <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->address}}</td>
                    <td>{{str_limit($contact->message, 50)}}</td>
                    <td>{{$contact->created_at->diffForHumans()}}</td>
                </tr>

                </tbody>
            @endforeach
        @endif
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            {{$contacts->render()}}
        </div>
    </div>

@stop
