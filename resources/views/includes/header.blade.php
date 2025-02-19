<!-- 
		=============================================
				Theme Main Menu
		============================================== 
		-->
<header class="theme-main-menu menu-overlay menu-style-one sticky-menu">
    <div class="inner-content position-relative">
        <div class="top-header">
            <div class="d-flex align-items-center">
                <div class="logo order-lg-0">
                    <a href="/" class="d-flex align-items-center">
                        <img src="{{ asset('asset/images/logo/logo-connector-header.png')}}" alt="" width="160">
                    </a>
                </div>
                <!-- logo -->
                <div class="right-widget ms-auto order-lg-3">
                    <ul class="d-flex align-items-center style-none">
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->utype==="ADM")
                        <li class="nav-item dropdown dashboard-menu">
                            <a class="nav-link dropdown-toggle login-btn-one" style="display: flex;" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <span class="mr-2 text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" height="20rem" width="20rem" src="{{asset('admin/img/undraw_profile.svg')}}">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" target="_blank" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" target="_blank" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </li>
                        @elseif(Auth::user()->utype==="SVP")
                        <li class="nav-item dropdown dashboard-menu">
                            <a class="nav-link dropdown-toggle login-btn-one" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" target="_blank" href="{{route('sprovider.dashboard')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" target="_blank" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item dropdown dashboard-menu">
                            <a class="nav-link dropdown-toggle login-btn-one" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" target="_blank" href="{{route('customer.dashboard')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" target="_blank" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <form id="logout-form" method="POST" action="{{route('logout')}}" style="display:none;">
                            @csrf
                        </form>
                        @else
                        <li><a href="#" class="login-btn-one" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                        @endif
                        @endif
                    </ul>
                </div> <!--/.right-widget-->
                <nav class="navbar navbar-expand-lg p0 ms-lg-5 ms-3 order-lg-2">
                    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-right">
                            <li class="d-block d-lg-none">
                                <div class="logo"><a href="/" class="d-block"><img src="{{ asset('asset/images/logo/logo.png')}}" alt="" width="100"></a></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/" role="button">Home </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('home.service_categories')}}" role="button">Categories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.services')}}" role="button">
                                    Services
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('home.service_provider')}}" role="button">Providers
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('home.blogs')}}" role="button">Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.contact')}}" role="button">Contact</a>
                            </li>
                            <li>
                                <form action="{{ route('services.search') }}" class="header-search position-relative ms-lg-5 ms-md-3 order-lg-1">
                                    <input type="text" name="query" placeholder="Search here..">
                                    <button type="submit">
                                        <i class="bi bi-search icon"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div> <!--/.top-header-->
    </div> <!-- /.inner-content -->
</header> <!-- /.theme-main-menu -->