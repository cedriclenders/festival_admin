@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('common.errors')
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
                @foreach(App\Models\User::admins() as $admin)
                    <tr>
                    <th scope="row">{{$admin->id}}</th>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                                @if ($admin->id == auth()->user()->id)
                                    <a>
                                        <button class="btn btn-secondary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" disabled>Make User</button>
                                    </a> 
                                @else
                                <a href="/make-user/{{$admin->id}}">
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete">Make User</button>
                                </a>    
                                @endif
                            </li>
                        </ul>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection