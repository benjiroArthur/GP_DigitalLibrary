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
                        <a href="#">Users</a>
                    </li>
                    <li class="breadcrumb-item active">
                        All Users
                    </li>
                </ol>
                {{----}}
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row justify-center-center mb-5">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header text-center h2">All Users</div>
                <div class="card-body">
                    @if(count($users) > 0)

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="userAllTable">
                                   {{--id="userAllTable">--}}
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID</th>
                                    <th>Role_id</th>
                                    <th>Name</th>
                                    <th>Service Number</th>
                                    <th>Role</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($id = 1)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$id}}</td>
                                        <td>{{$user->role->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td class="text-white">
                                            {!! Form::open(['method'=>'DELETE', 'route'=>['user.destroy', $user->id]]) !!}
                                            <a class="btn btn-success" href="{{url('user/'.$user->id)}}"><span class="mdi mdi-eye show"></span></a>
                                            <a class="btn btn-warning " href="{{url('user/'.$user->id.'/edit')}}"><span class="edit mdi mdi-file-document-edit"></span></a>
                                            <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this User?')"><span class="mdi mdi-delete"></span></button>
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


    <style>
        span.edit:hover:before{
            content: 'edit ';
            position: relative;
            color: blue;
            font-size: 12px;
        }

        span.show:hover:before{
            content: 'show ';
            position: relative;
            color: blue;
            font-size: 12px;
        }

        span.delete:hover:before{
            content: 'delete ';
            position: relative;
            color: white;
            font-size: 12px;
        }

        span#mod:hover:before{
            content: 'mod ';
            position: relative;
            color: blue;
            font-size: 12px;
        }

        span#transfer:hover:before{
            content: 'transfer ';
            position: relative;
            color: white;
            font-size: 12px;
        }


    </style>
@endsection
