<div class="nav-header">
    <a href="{{ route('index.index') }}" class="brand-logo">
        <span>
            <img src="/assets/images/logo-2.png">
        </span>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************  Nav header end ***********************************-->
<!--**********************************  Chat box start ***********************************-->

<!--**********************************  Chat box End ***********************************-->
<!--**********************************  Header start ***********************************-->
<div class="header" style="background: #3695EB">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        @yield('judul')
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    @yield('calender')
                    <li class="nav-item dropdown header-profile">
                        @if (Auth::check())
                            <a href="{{ route('logout') }}" class="dropdown-item ai-icon"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                    width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12">
                                    </line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
