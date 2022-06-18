@extends('layouts.master')

@section('content')
<div class="container-fluid">
    @include('common.errors')
        <div class="float-right">
            <a href="/performance-add"><button type="button" class="btn btn-primary">Add Performance</button></a>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Stage</th>
                    <th scope="col">Performer</th>
                    <th scope="col">StartTime</th>
                    <th scope="col">EndTime</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($performances as $performance)
                        <tr>
                        <th scope="row">{{$performance->id}}</th>
                        <td>{{$performance->stage->name ?? 'No stage selected'}}</td>
                        
                        <td>{{$performance->performer->name}}</td>
                        <td>{{$performance->timeslot->start_datetime}}</td>
                        <td>{{$performance->timeslot->end_datetime}}</td>
                        <td>
                            <!-- Call to action buttons -->
                            <ul class="list-inline m-0">
                            
                                    <li class="list-inline-item">
                                        <a href="/performance/{{$performance->id}}">
                                        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                        </a>       
                                    </li>
                                
                                <li class="list-inline-item">
                                    <a href="/performance-delete/{{$performance->id}}">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </a>    
                                </li>
                            </ul>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection