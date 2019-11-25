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
                        Show Category
                    </li>
                </ol>
                {{--<h4 class="page-title">Add Users</h4>--}}
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row justify-center-center mb-5">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header text-center h2">Categories Details</div>
                <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                {{--id="userAllTable">--}}
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY ID</th>
                                    <th>Name</th>
                                    <th>COVER IMAGE</th>
                                    <th>DATE CREATED</th>
                                    <th>LAST UPDATED</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($id = 1)
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <div class="card-img">
                                                <img class="img-responsive" src="{{$category->cover_image}}" style="width: 100px; height: auto">
                                            </div>
                                        </td>
                                        <td>{{$category->created_at}}</td>
                                        <td>{{$category->updated_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>

        </div>

    </div>
@endsection