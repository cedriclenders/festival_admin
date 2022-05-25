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
            @foreach(App\Models\User::admins() as $admin)
                <tr>
                <th scope="row">{{$admin->id}}</th>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection