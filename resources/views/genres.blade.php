@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('common.errors')
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGenreModal">Add genre</button>
        </div>
    <br/>
    <br/>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Genre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genres as $genre)
                    <tr>
                    <th scope="row">{{$genre->id}}</th>
                    <td>{{$genre->name}}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="addGenreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add genre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('addGenre')}}" method="POST">
                @csrf
                <label for="genre">Genre:</label><br>
                <input type="text" id="genre" name="name" value="" placeholder="Genre" required><br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection