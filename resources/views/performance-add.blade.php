@extends('layouts.master')
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        

    <!-- Content Row -->

    @if(!(App\Models\Stage::all()->count()))
        <h1 class="h3 mb-0 text-gray-800">No stages</h1>
        <a href="{{url('/stage-add')}}"><button type="button" class="btn btn-primary">Add Stage</button></a>
    </div>
    <div class="modal" id="stageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">No stages</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>You need atleast 1 stage before you can make a performance.</p>
            </div>
            <div class="modal-footer">
                <a href="{{url('/stage-add')}}"><button type="button" class="btn btn-primary">Add Stage</button></a>
                <a href="{{url('/')}}"><button type="button" class="btn btn-secondary">Return</button></a>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#stageModal').modal('show');
    });
</script>
    @else
    <h1 class="h3 mb-0 text-gray-800">Add Performance</h1>
</div>
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
                        <input style="display: none" type="text" name="id" value="">
                        <input style="display: none" type="text" name="performer_id" value="">
                        <div class="form-group required">
                            <label class="control-label" for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                          </div>
                        <div class="form-group">
                            <label>Description:</label><textarea class="ckeditor form-control" name="description" required> </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Genre:</label>
                            @foreach (App\Models\Genre::all() as $genre)                     
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre_id" id="genre_id" value="{{$genre->id}}" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$genre->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="youtube_link"><i class="fab fa-youtube"></i> Youtube link
                            </label>
                            <input type="text" name="youtube_link" class="form-control" id="youtube_link" placeholder="https://www.youtube.com/watch?v=OS8taasZl8k" >
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
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stage_id" id="stage_id" value="{{$stage->id}}" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{$stage->name}}
                                </label>
                            </div>
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
                    <input style="display: none" type="text" name="timeslot_id" value="">
                    <div class="form-group">
                    <label for="startTime">Start time:</label>
                    <input type="datetime-local" id="startTime" name="startTime"  required>
                    </div>
                    <div class="form-group">
                    <label for="endTime">End time:</label>
                    <input type="datetime-local" id="endTime" name="endTime" required>
                    </div>
                     
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </div>
    </div>
</div>
    @endif


@endsection
