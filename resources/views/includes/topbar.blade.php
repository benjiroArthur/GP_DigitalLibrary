<nav class="navbar horizontal-layout col-lg-12 col-12 p-0 col-sm-12">
    <div class="container d-flex flex-row nav-top ">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top border-right-sm">
            <a class="navbar-brand brand-logo" href="{{url('/')}}">
                <img src="{{asset('images/assets/gp_logo.png')}}" alt="logo" height="60px"/> </a>

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            {{----}}
            <ul class="navbar-nav ml-auto">

                @guest
                    <li class="nav-item btn btn-primary" style="background-color: #09123e; border-radius: 20px; border-color: #09123e; height: auto;">
                        <a class="nav-link" href="{{ route('login') }}" style="color: white">{{ __('Login') }}</a>
                    </li>


                @else
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="wrapper d-flex flex-column">
                                <span class="profile-text">{{auth()->user()->username}}</span>
                                <span class="user-designation">{{auth()->user()->role->name}}</span>
                            </div>
                            <div class="display-avatar bg-inverse-primary text-primary">
                                <img class="img-md rounded-circle" src="{{auth()->user()->image}}" alt="AS">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">

                                <p class="mb-1 mt-3 font-weight-semibold">{{strtoupper(auth()->user()->name)}}</p>

                            </div>
                            <ul style="list-style: none">
                                <li>
                                    <a class="dropdown-item" href="{{url('/user/'.auth()->user()->id)}}">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('/user/'.auth()->user()->id.'/edit-profile')}}">Update Profile</a>
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

            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize" data-target="#navbarSupportedContent">
                <span class="mdi mdi-menu"></span>
            </button>

        </div>

    </div>
    @auth
        <div class="nav-bottom" id="navbarSupportedContent">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="link-icon mdi mdi-airplay"></i>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>

                    @if(auth()->user()->role->id == 1)
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="link-icon mdi mdi-account-box-multiple"></i>
                                <span class="menu-title">Users</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="category-heading">Users Records</p>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="submenu-item">
                                                    <li class="nav-item myNav">
                                                        <a class="nav-link" href="{{route('user.index')}}">View Users</a>
                                                    </li>
                                                    <li class="nav-item myNav">
                                                        <a class="nav-link" href="{{route('user.create')}}">Add Users</a>
                                                    </li>
                                                    <li class="nav-item myNav">
                                                        <a class="nav-link" href="{{route('excelTemplate')}}">Download Template</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="link-icon mdi mdi-book-multiple"></i>
                                <span class="menu-title">Books</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Books</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('books.index')}}">View All Books</a>
                                            </li>
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('books.create')}}">Add Books</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Categories</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('category.index')}}">View All Categories</a>
                                            </li>
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('category.create')}}">Add Category</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Groups</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('group.index')}}">View All Groups</a>
                                            </li>
                                            <li class="nav-item myNav">
                                                <a class="nav-link" href="{{route('group.create')}}">Add Group</a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    @endauth
</nav>