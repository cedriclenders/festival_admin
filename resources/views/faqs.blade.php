@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('common.errors')
        <div class="float-right">
            <a href="/faq-add"><button type="button" class="btn btn-primary">Add FAQ</button></a>
        </div>
    <br/>
    <br/>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Question</th>
                <th scope="col">Answer</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                    <th scope="row">{{$faq->id}}</th>
                    <td>{{$faq->question}}</td>
                    <td>{!! substr($faq->answer, 0, 60) !!} ...</td>
                    <td>
                        <!-- Call to action buttons -->
                        <ul class="list-inline m-0">
                           
                                <li class="list-inline-item">
                                    <a href="/faq/{{$faq->id}}">
                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                     </a>       
                                </li>
                            
                            <li class="list-inline-item">
                                <a href="/faq-delete/{{$faq->id}}">
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