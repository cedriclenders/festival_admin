@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="float-right">
            <a href="/stage-add"><button type="button" class="btn btn-primary">Add Stage</button></a>
        </div>
    <br/>
    <br/>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stages as $stage)
                    <tr>
                    <th scope="row">{{$stage->id}}</th>
                    <td>{{$stage->name}}</td>
                    <td>{!! substr($stage->description, 0, 35) !!} ...</td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                           
                                <li class="list-inline-item">
                                    <a href="/stage/{{$stage->id}}">
                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </a>       
                                </li>
                            
                            <li class="list-inline-item">
                                <a href="/stage-delete/{{$stage->id}}">
                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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