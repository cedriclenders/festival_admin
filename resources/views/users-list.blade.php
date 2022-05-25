@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Models\User::users() as $user)
                <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection