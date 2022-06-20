@extends('layouts.master')
@section('content')
<div class="container-fluid">
    @include('common.errors')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Stage</h1>
    </div>


    <!-- Content Row -->

    <div class="row">
        <!-- Description -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Stage Info</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('stageUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <input style="display: none" type="text" name="id" value="">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="" required>
                          </div>
                        <div class="form-group">
                            <label>Description:</label><textarea class="ckeditor form-control" name="description"></textarea>
                        </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Location</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" >         
                    
                    <div class="form-group">
                        <p>Click on the map to set coordinates</p>
                        <div id="google-map">
                        </div>
                        <br/>
                        <label for="lat">Lat:</label>
                        <input id='lat' type="text" name="lat" class="form-control" value="{{$festival->lat}}" required>
                      </div>
                      <div class="form-group">
                        <label for="long">Long:</label>
                        <input id='long' type="text" name="long" class="form-control" value="{{$festival->long}}" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    

</div>
<script src="{{ asset('js/location.js') }}"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=initMap"
defer
></script>
@endsection