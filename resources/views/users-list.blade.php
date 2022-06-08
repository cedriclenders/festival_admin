@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\User::users() as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a href="/make-admin/{{$user->id}}">
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete">Make Admin</button>
                                </a>    
                            </li>
                        </ul>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection