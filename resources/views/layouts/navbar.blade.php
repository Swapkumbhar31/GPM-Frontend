<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"
            href="{{ url('/') }}">
            <img src="{{asset('images/icons/general-icon/GPM Logo_Line.png')}}"
                alt="Logo"
                style="height:20px;">
        </a>
        <div class="collapse navbar-collapse"
            id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link  {{ Nav::isRoute('home') }}"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Nav::isRoute('aboutus') }}"
                        href="/about-us">About Us</a>
                </li>
                @guest
                @else
                <li class="nav-item">
                    <a class="nav-link {{ Nav::isRoute('dashboard') }}"
                        href="/profile">Dashboard</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link  {{ Nav::isRoute('contactus') }}"
                        href="/contact-us">Contact Us</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link  {{ Nav::isRoute('login') }}"
                        href="/login">{{ __('Login') }}</a>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
                <li class="nav-item no-dash">
                    <a class="nav-link sidebar-toggler"
                        href="javascript:void(0)">
                        <img src="{{ asset('images/icons/general-icon/menu.svg') }}"
                            class="img-fluid">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="visible-sm sm-navbar">
    <div class="row bg-white">
        <div class="menu-sm col-6 logo-sm">
            <a>
                <img src="{{ asset('images/icons/general-icon/GPM_Logo_Line.png') }}"
                    alt="Logo">
            </a>
        </div>
        @guest
        <div class="menu-sm col-4">
            <a class="nav-sm logged-sm"
                href="javascript:void(0)">Log in</a>
        </div>
        @else
        <div class="menu-sm col-4">
            <a class="nav-sm logged-sm"
                href="javascript:void(0)">Logout</a>
        </div>
        @endguest
        <div class="menu-sm col-2 text-right">
            <img class="icon sidebar-toggler"
                src="{{asset('images/icons/general-icon/menu.svg')}}"
                height="20px">
        </div>
    </div>
</div>

<div class="full-page-menu">
    <div class="menu-backdrop sidebar-toggler"
        id="menu-backdrop">
        <div class="close-btn">
            <i class="fa fa-times fa-2x text-white"
                aria-hidden="true"></i>
        </div>
        <ul class="menu">
            <li>
                <a href="/"
                    class="menu-link">Home</a>
            </li>
            @guest
            @else
            <li class="nav-item">
                <a class="menu-link"
                    href="/profile">Dashboard</a>
            </li>
            @endguest
            <li>
                <a href="/about-us"
                    class="menu-link">About Us</a>
            </li>
            <li>
                <a href="/membership"
                    class="menu-link">Membership</a>
            </li>
            @guest
            <li>
                <a href="/register"
                    class="menu-link">Registration</a>
            </li>
            @endguest
            <li>
                <a href="/term-and-conditions"
                    class="menu-link">Terms &
                    Conditions
                </a>
            </li>
            <li>
                <a href="/refund-policy"
                    class="menu-link">Refund Policy</a>
            </li>
            <li>
                <a href="/contact-us"
                    class="menu-link">Contact Us</a>
            </li>

        </ul>
    </div>
</div>
