<!-- ************************ Header **************************** -->
        <header class="dashboard-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                    <span></span>
                </button>
                <div class="profile-notification ms-2 ms-md-5 me-4">
                    <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                        <div class="badge-pill"></div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
                        <li>
                            <h4>Notification</h4>
                            <ul class="style-none notify-list">
                                @foreach(\App\Models\ServiceBooking::where('user_id', Auth::user()->id)->take(4)->get() as $booking )
                                <li class="d-flex align-items-center unread">
                                    <a href="{{ route('ServiceBookedDetail', $booking->id) }}">
                                    <div class="flex-fill ps-2">
                                        <h6>{{ $booking->service->name }}</h6>
                                        <span class="time">{{ $booking->status }}</span>
                                        <span class="time">{{ $booking->date }}</span>
                                    </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div><a href="{{ route('customer.services') }}" class="job-post-btn tran3s">Book Service</a></div>
            </div>
        </header>
        <!-- End Header -->