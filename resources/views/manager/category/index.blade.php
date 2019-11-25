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
                    <a href="#">Categories</a>
                </li>
                <li class="breadcrumb-item active">
                    All Categories
                </li>
            </ol>
            {{--<h4 class="page-title">All Categories</h4>--}}
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="row justify-center-center mb-5">
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header text-center h2">All Categories</div>
            <div class="card-body">
                @if(count($categories) > 0)

                    <div class="table-responsive">
                        <table class="table table-striped">
                            {{--id="userAllTable">--}}
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Cover Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($id = 1)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <div class="card-img">
                                            <img class="img-responsive" src="{{$category->cover_image}}" style="width: 100px; height: auto">
                                        </div>
                                    </td>
                                    <td class="text-white">
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['category.destroy', $category->id]]) !!}
                                        <a class="btn btn-success" href="{{url('manager/category/'.$category->id)}}"><span class="mdi mdi-eye show"></span></a>
                                        <a class="btn btn-warning" href="{{url('manager/category/'.$category->id.'/edit')}}"><span class="edit mdi mdi-file-document-edit"></span></a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger"
                                                onclick="return confirm('Deleting this Category will Delete its associate Groups and Books, Are you sure you want to Proceed?')"><span class="mdi mdi-delete"></span></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @php($id++)
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection