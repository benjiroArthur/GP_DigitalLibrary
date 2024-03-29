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
                    <a href="#">Group</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Group
                </li>
            </ol>

        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
    <div class="col-12">
        <div class="card-box">


            <h4 class="header-title m-t-0 text-center">Edit Group</h4>

            {!! Form::open(['action' => ['GroupController@update', $group->id], 'method' => 'POST', 'enctype' => 'multipart/form-data','files'=>'true']) !!}
            {{method_field('PUT')}}
            {{ csrf_field() }}

            <div class="row">

                <div class="col-lg-6 offset-lg-3 formBox">
                    <div class="p-20">


                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" name="name" parsley-trigger="change" required
                                   placeholder="Group Name" class="form-control" id="name" value="{{$group->name}}">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select type="text" name="category_id" required class="form-control" id="category_id">
                                <option value="{{$group->category->id}}">{{$group->category->name}}</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif

                            </select>

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