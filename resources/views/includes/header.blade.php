<div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="{{ asset('manager/img/logo.png') }}" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{asset ('manager/img/logo-small.png')}}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{asset('manager/img/icons/closes.svg') }}" alt="img"></span>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ Auth::user()->profile_image ? asset('storage/pictures/' . Auth::user()->profile_image) : asset('storage/pictures/null-profile.png') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{ Auth::user()->profile_image ? asset('storage/pictures/' . Auth::user()->profile_image) : asset('storage/pictures/null-profile.png') }}" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>{{Auth::user()->last_name}},{{Auth::user()->first_name}}</h6>
                                    <h5>{{Auth::user()->role}}</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My
                                Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout pb-0"><img src="{{ asset('manager/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>

        </div>