@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Performance</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


    <!-- Content Row -->

    <div class="row">
        <!-- Description -->
        <div class="col-xl-8 col-lg-7">
            
            
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performer</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('performanceUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <input style="display: none" type="text" name="id" value="{{ $performance->id }}">
                        <input style="display: none" type="text" name="performer_id" value="{{ $performance->performer->id }}">
                        <div class="form-group required">
                            <label class="control-label" for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $performance->performer->name }}" required>
                          </div>
                        <div class="form-group">
                            <label>Description:</label><textarea class="ckeditor form-control" name="description" required>{!! $performance->performer->description !!} </textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Genre:</label>
                            @foreach (App\Models\Genre::all() as $genre)
                                @if ($performance->performer->genre_id == $genre->id)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre_id" id="genre_id" value="{{$genre->id}}" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$genre->name}}
                                    </label>
                                </div>

                                @else
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre_id" id="genre_id" value="{{$genre->id}}" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$genre->name}}
                                    </label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Stage</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                
                        @foreach (App\Models\Stage::all() as $stage)
                            @if ($performance->stage)
                                @if ($performance->stage->id == $stage->id)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stage_id" id="stage_id" value="{{$stage->id}}" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{$stage->name}}
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stage_id" id="stage_id" value="{{$stage->id}}" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{$stage->name}}
                                        </label>
                                    </div>
                                @endif
                            @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stage_id" id="stage_id" value="{{$stage->id}}" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{$stage->name}}
                                        </label>
                                    </div>

                            @endif
                        @endforeach
                       
                </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Timeslot</h6>
            </div>
            <!-- Description Body -->
            <div class="card-body">
                    <input style="display: none" type="text" name="timeslot_id" value="{{ $performance->timeslot->id }}">
                    <div class="form-group">
                    <label for="startTime">Start time:</label>
                    <input type="datetime-local" id="startTime" name="startTime" value="{{$performance->timeslot->dateTimeFormatStart()}}" required>
                    </div>
                    <div class="form-group">
                    <label for="endTime">End time:</label>
                    <input type="datetime-local" id="endTime" name="endTime" value="{{$performance->timeslot->dateTimeFormatEnd()}}" required>
                    </div>
                     
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </div>
    </div>

    <!-- Content Row -->
    

        <!-- Content Column -->
        <div class="col-xl-8 col-lg-7">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <div>
                        <div class="row text-center text-lg-start">
                            @foreach ($performance->performer->photos as $photo)
                                <div class="col-lg-3 col-md-4 col-6">
                              <a href="{{ asset('/storage/'.$photo->path) }}" target="_blank" data-fancybox="images" class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="{{ asset('/storage/'.$photo->path) }}" alt="">
                              </a>
                            </div>
                            
                            @endforeach
                            
                          </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ url('save-performer-image', $performance) }}" >
                        @csrf
                        <div class="row">
            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                @if(session()->has('error'))
                                    <div class="alert alert-success">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
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
@endsection