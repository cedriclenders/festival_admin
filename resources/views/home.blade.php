@extends('layouts.master')

@section('content')

<div class="container-fluid">
    
    @include('common.errors')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Overview</h1>
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNotificationModal">Send Notification</button>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/users-list">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users (total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\User::users()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    {{-- <div class="row no-gutters align-items-center">
                        <button type="button" class="btn btn-outline-primary">More Info</button>
                    </div> --}}
                </div>
            </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/admins-list">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Admins (TOTAL)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\User::admins()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <a href="/performances">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Performances (TOTAL)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Performance::count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-music fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Stages -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/stages">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Stages (TOTAL)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Stage::count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Description -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Festival Info</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('festivalInfoUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $festival->name }}" required>
                          </div>
                        <div class="form-group">
                            <label>Description:</label><textarea class="ckeditor form-control" name="description" required>{{ $festival->description }} </textarea>
                        </div>
                        
                </div>

                <div class="card-body">
                    <input style="display: none" type="text" name="timeslot_id" value="">
                    <div styleclass="form-group">
                        <label for="start">Start date:</label>
                       
                        <input type="date" id="start" name="start"   @if($festival->start_date)
                        value="{{ $festival->start_date->format('Y-m-d') }}"
                        @endif required >
                        
                    </div>
                    <div class="form-group">
                        <label for="end">End date:</label>
                        <input type="date" id="end" name="end"  @if($festival->end_date)
                        value="{{ $festival->end_date->format('Y-m-d') }}"
                        @endif required>
                        </div>
                    <br/>
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
                        <input id='lat' type="text" name="lat" class="form-control" value="{{ $festival->lat}}">
                      </div>
                      <div class="form-group">
                        <label for="long">Lng:</label>
                        <input id='long' type="text" name="long" class="form-control" value="{{ $festival->long }}">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Content Row -->
    
    <div class="row">
        <div class="col-xl-6 col-lg-7">
            <!-- Content Column -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Images</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <div>
                        <div class="row text-center text-lg-start">
                            @foreach ($festival->photos as $photo)

                            
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="/delete-image/{{$photo->id}}"><span class="close">&times;</span></a>
                                     <a href="{{ asset('/storage/'.$photo->path) }}" target="_blank" data-fancybox="images" class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="{{ asset('/storage/'.$photo->path) }}" alt="">
                              </a>
                            </div>
                            
                            @endforeach
                            
                          </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ url('save-festival-image') }}" >
                        @csrf
                        <div class="row">
            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit">Upload</button>
                            </div>
                        </div>     
                    </form>

                </div>

                

            </div>
            
        </div>

        <div class="col-xl-6 col-lg-7">
            <!-- Content Column -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">App Icon</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <div>
                        <p>Add an icon for the app. This image has to be square!</p>
                        <div class="row text-center text-lg-start">
                            @foreach ($festival->icons as $photo)                       
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="/delete-image/{{$photo->id}}"><span class="close">&times;</span></a>
                                     <a href="{{ asset('/storage/'.$photo->path) }}" target="_blank" data-fancybox="images" class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="{{ asset('/storage/'.$photo->path) }}" alt="">
                              </a>
                            </div>
                            
                            @endforeach
                            
                          </div>
                    </div>
                    @if($festival->icons->count() == 0)
                    <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ url('save-app-image') }}" >
                        @csrf
                        <div class="row">
            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit">Upload</button>
                            </div>
                        </div>     
                    </form>
                    @endif

                </div>
            </div>          
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="addNotificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Send notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('sendNotification')}}" method="POST">
                @csrf
                <div>
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="" placeholder="Title" required>
                </div>
                <div>
                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description" value="" placeholder="Description" required><br><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/location.js') }}"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=initMap"
defer
></script>
@endsection
