<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->
<aside class="dash-aside-navbar">
    <div class="position-relative">
        <div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
            <a href="{{route('sprovider.dashboard')}}">
                <img src="images/logo_01.png" alt="">
            </a>
            <button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="user-data">
            <div class="user-avatar online position-relative rounded-circle">
                <img src="../images/lazy.svg" data-src="images/avatar_03.jpg" alt="" class="lazy-img">
            </div>
            <!-- /.user-avatar -->
            <div class="user-name-data">
                <button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('sprovider.profile')}}"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_23.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('sprovider.edit_profile')}}"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_24.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_25.svg')}}" alt="" class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.user-data -->
        <nav class="dasboard-main-nav">
            <ul class="style-none">
                <li><a href="{{route('sprovider.dashboard')}}" class="d-flex w-100 align-items-center active">
                        <img src="../images/lazy.svg" data-src="images/icon/icon_1_active.svg" alt="" class="lazy-img">
                        <span>Dashboard</span>
                    </a></li>
                <li><a href="{{route('offerings.service')}}" class="d-flex w-100 align-items-center">
                        <img src="../images/lazy.svg" data-src="images/icon/icon_3.svg" alt="" class="lazy-img">
                        <span>My Services</span>
                    </a></li>
                <li><a href="{{route('sprovider.add_service')}}" class="d-flex w-100 align-items-center">
                        <img src="../images/lazy.svg" data-src="images/icon/icon_4.svg" alt="" class="lazy-img">
                        <span>Add Service</span>
                    </a></li>
                <li><a href="{{route('sprovider.order')}}" class="d-flex w-100 align-items-center">
                        <img src="../images/lazy.svg" data-src="images/icon/icon_39.svg" alt="" class="lazy-img">
                        <span>My Bookings</span>
                    </a></li>
                    <li><a href="{{route('sprovider.add_portfolio')}}" class="d-flex w-100 align-items-center">
                        <img src="../images/lazy.svg" data-src="images/icon/icon_39.svg" alt="" class="lazy-img">
                        <span>Add Portfolio</span>
                    </a></li>
                
            </ul>
        </nav>
        <!-- /.dasboard-main-nav -->
        
        
        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-flex w-100 align-items-center logout-btn">
            <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/icon/icon_9.svg')}}" alt="" class="lazy-img">
            <form id="logout-form" method="POST" action="{{route('logout')}}" style="display:none;">
                @csrf
            </form>
            <span>Logout</span>
        </a>
    </div>
</aside>
<!-- /.dash-aside-navbar -->