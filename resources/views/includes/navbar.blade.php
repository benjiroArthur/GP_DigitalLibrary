<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #09123e">

    <div class="container-fluid">
        <div style="background-color: white">
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{asset('images/assets/gp_logo.png')}}" alt="logo" height="30px"/>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="color: white !important;">
            {{--<span class="navbar-toggler-icon text-white"  style="color: white !important;"></span>--}}
            <span class="mdi mdi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                <ul class="nav navbar-nav mr-auto mt-2 mt-lg-0 text-white">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link text-white">
                            <i class="link-icon mdi mdi-airplay"></i>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>
                    @if(auth()->user()->role->id == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="link-icon mdi mdi-account-box-multiple"></i>
                                <span class="menu-title">Users</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="container-fluid submenu">
                                <div class="row">
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="width: 100%">


                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 col-group text-center">
                                                <p class="category-heading">Users Records</p>

                                                <a class="nav-link myNav" href="{{route('user.index')}}">View Users</a>


                                                <a class="nav-link myNav" href="{{route('user.create')}}">Add Users</a>


                                                <a class="nav-link myNav" href="{{route('excelTemplate')}}">Download Template</a>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="link-icon mdi mdi-book-multiple"></i>
                                <span class="menu-title">Books</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="width: 100%">


                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 col-group text-center">
                                                <p class="category-heading ">Books</p>

                                                <a class="nav-link myNav" href="{{route('books.index')}}">View All Books</a>


                                                <a class="nav-link myNav" href="{{route('books.create')}}">Add Books</a>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="link-icon mdi mdi-book-multiple"></i>
                                <span class="menu-title">Category</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="width: 100%">


                                            <div class="col-sm-12 col-lg-12 col-md-12 text-center">
                                                <p class="category-heading">Category</p>

                                                <a class="nav-link myNav" href="{{route('category.index')}}">View All Categories</a>


                                                <a class="nav-link myNav" href="{{route('category.create')}}">Add Category</a>

                                            </div>

                                        </div>




                                </div>
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="link-icon mdi mdi-book-multiple"></i>
                                <span class="menu-title">Groups</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="width: 100%">


                                        <div class="row">

                                            <div class="col-sm-12 col-lg-12 col-md-12 text-center">
                                                <p class="category-heading">Groups</p>

                                                <a class="nav-link myNav" href="{{route('group.index')}}">View All Groups</a>


                                                <a class="nav-link myNav" href="{{route('group.create')}}">Add Group</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </li>
                    @endif
                </ul>

        @endauth
            <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" style="background-color: #09123e; border-radius: 20px; border-color: #09123e; height: auto; color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <div class="wrapper d-flex flex-column mr-3">
                                    <span class="profile-text">{{auth()->user()->username}}</span>
                                    <span class="user-designation">{{auth()->user()->role->name}}</span>
                                </div>
                                <div class="display-avatar bg-inverse-primary text-primary">
                                    <img class="img-md rounded-circle" src="{{auth()->user()->image}}" alt="AS">
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-header text-center">

                                    <p class="mb-1 mt-3 font-weight-semibold">{{strtoupper(auth()->user()->name)}}</p>

                                </div>
                                <ul style="list-style: none">
                                    <li>
                                        <a class="dropdown-item" href="{{url('/user/'.auth()->user()->id)}}">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{url('/user/'.auth()->user()->id.'/editProfile')}}">Update Profile</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{url('/user/'.auth()->user()->id.'/changePassword')}}">Change Password</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endguest
                </ul>

        </div>

    </div>
</nav>



{{--<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="logo horizontal-logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/horizontal-logo.svg" alt="forecastr logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>--}}

