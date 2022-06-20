@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('common.errors')
        <div class="float-right">
            <a href="/marker-add"><button type="button" class="btn btn-primary">Add Marker</button></a>
        </div>
    <br/>
    <br/>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Long</th>
                <th scope="col">Lat</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($markers as $marker)
                    <tr>
                    <th scope="row">{{$marker->id}}</th>
                    <td>{{$marker->name}}</td>
                    <td>{{$marker->long}}</td>
                    <td>{{$marker->lat}}</td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a href="/marker-delete/{{$marker->id}}">
                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            </li>
                        </ul>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="col-xl-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Location</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" >         
                        <div id="google-map">
                        </div>             
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=init" async="false" defer ></script>
@endsection