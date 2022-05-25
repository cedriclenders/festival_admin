@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Stage</th>
              <th scope="col">Performer</th>
              <th scope="col">StartTime</th>
              <th scope="col">EndTime</th>
            </tr>
        </thead>
        <tbody>
            @foreach($performances as $performance)
                <tr>
                <th scope="row">{{$Performance->id}}</th>
                <td>{{$performance->stage_name}}</td>
                <td>{{$performance->performer_name}}</td>
                <td>{{$performance->start}}</td>
                <td>{{$performance->end}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection