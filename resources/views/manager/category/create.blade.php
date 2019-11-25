@extends('layouts.app')
@section('content')
    <!-- Page-Title -->
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="page-title-box">
                <ol class="breadcrumb hide-phone float-right p-0 m-0">
                    <li class="breadcrumb-item">
                        <a href="#">GP Digital Library</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Category</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add Category
                    </li>
                </ol>
                {{--<h4 class="page-title">Add Users</h4>--}}
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">


                <h4 class="header-title m-t-0 text-center">Add Category</h4>

                {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data','files'=>'true']) !!}

                {{ csrf_field() }}

                <div class="row">

                    <div class="col-lg-6 offset-3 formBox">
                        <div class="p-20">


                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" parsley-trigger="change" required
                                       placeholder="Category Name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label>Cover Image <span class="text-danger"></span></label>
                                <input type="file" class="form-control" name="cover_image">
                            </div>



                        <div class="form-group text-center m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" style="background-color: #09123e !important;">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>
    </div>
@endsection