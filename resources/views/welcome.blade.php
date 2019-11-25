
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #09123e;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>


@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-sm-4">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="content mt-xl-5">
                    <div class="title m-b-md pt-xl-5">
                        <h1 class="font-weight-bolder">WELCOME TO</h1>
                        <img src="{{asset('images/assets/welcome_logo.png')}}" class="img-fluid">
                    </div>

                    <div class="links">
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <a href="#">{{$category->name}}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
