<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->
<aside class="dash-aside-navbar">
    <div class="position-relative">

        <div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
            <a href="/">
                <img src="{{ asset('asset/images/logo/logo-connector-footer.png')}}" alt="">
            </a>
            <button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
        </div>
        <!-- /.user-data -->
        <nav class="dasboard-main-nav">
            <ul class="style-none">
                <li><a href="{{ route('customer.dashboard') }}" class="d-flex w-100 align-items-center active">
                        <i class="bi bi-speedometer"></i>
                        <span>Dashboard</span>
                    </a></li>
                <li><a href="{{ route('customer-profile') }}" class="d-flex w-100 align-items-center">
                        <i class="bi bi-person-circle"></i>
                        <span>My Profile</span>
                    </a></li>
                <li><a href="{{ route('customer.services') }}" class="d-flex w-100 align-items-center">
                        <i class="bi bi-list-stars"></i>
                        <span>Explore Services</span>
                    </a></li>
                <li><a href="{{ route('CustomerServiceBooked') }}" class="d-flex w-100 align-items-center">
                        <i class="bi bi-cart2"></i>
                        <span>Services Booked</span>
                    </a></li>
                <li><a href="{{ route('CustomerProfile.edit')}}" class="d-flex w-100 align-items-center">
                        <i class="bi bi-person-fill-gear"></i>
                        <span>Account Settings</span>
                    </a></li>
                    <li><a href="{{ route('customer.GetProviderService')}}" class="d-flex w-100 align-items-center">
                        <i class="bi bi-person-fill-gear"></i>
                        <span>Explore service providers</span>
                    </a></li>
                <!-- /.dasboard-main-nav -->

                <li><a href="{{route('logout')}}" class="d-flex w-100 align-items-center logout-btn"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dropdown-item">
                        <form id="logout-form" method="POST" action="{{route('logout')}}" style="display:none;">
                            @csrf
                        </form>
                        <i class="bi bi-box-arrow-left"></i><span>Sign Out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- /.dash-aside-navbar -->