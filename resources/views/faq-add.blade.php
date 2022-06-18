@extends('layouts.master')
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add FAQ</h1>
    </div>


    <!-- Content Row -->

    <div class="row">
        <!-- Description -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">FAQ Info</h6>
                </div>
                <!-- Description Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('faqUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <input style="display: none" type="text" name="id" value="">
                        <div class="form-group">
                            <label for="name">Question:</label>
                            <input type="text" name="question" class="form-control" id="question" value="" required>
                          </div>
                        <div class="form-group">
                            <label>Answer:</label><textarea class="ckeditor form-control" name="answer"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->
    

</div>
@endsection