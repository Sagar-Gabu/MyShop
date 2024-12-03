<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard orders over $100
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>
                    <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{ route('site.index') }}" class="logo">
                    <img src="{{ asset('site/images/icons/logo-01.png') }}" alt="Site Logo">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{ Request::routeIs('site.index') ? 'active-menu' : '' }}">
                            <a href="{{ route('site.index') }}">Home</a>
                        </li>
                        <li class="{{ Request::routeIs('site.shop') ? 'active-menu' : '' }}">
                            <a href="{{ route('site.shop') }}">Shop</a>
                        </li>
                        <li>
                            <a href="">Features</a>
                        </li>
                        <li class="{{ Request::routeIs('site.blog') ? 'active-menu' : '' }}">
                            <a href="{{ route('site.blog') }}">Blog</a>
                        </li>
                        <li class="{{ Request::routeIs('site.about') ? 'active-menu' : '' }}">
                            <a href="{{ route('site.about') }}">About</a>
                        </li>
                        <li class="{{ Request::routeIs('site.contact') ? 'active-menu' : '' }}">
                            <a href="{{ route('site.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search" aria-label="Search"></i>
                    </div>
                    @if(Route::has('login'))
                    @auth
                    
                    <!-- Shopping Cart Icon -->
                    <a href="{{ route('site.cart') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti">
                        <i class="zmdi zmdi-shopping-cart" aria-label="Shopping Cart"></i>
                    </a>

                    <!-- Favorites Icon -->
                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline" aria-label="Favorites"></i>
                    </a>
                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none" title="Logout" aria-label="Logout">
                            <i class="zmdi zmdi-power" style="font-size: 1.5rem;" aria-hidden="true"></i>
                        </button>
                    </form>

                    @else
                    <!-- Login Icon -->
                    <a href="{{ route('login') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <i class="zmdi zmdi-account-circle" aria-label="Login"></i>
                    </a>
                    @endauth
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo mobile -->
        <div class="logo-mobile">
            <a href="{{ route('site.index') }}">
                <img src="{{ asset('site/images/icons/logo-01.png') }}" alt="Site Logo">
            </a>
        </div>
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search" aria-label="Search"></i>
            </div>
            <!-- Shopping Cart Icon -->
            <a href="{{ route('site.cart') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart">
                <i class="zmdi zmdi-shopping-cart" aria-label="Shopping Cart"></i>
            </a>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline" aria-label="Favorites"></i>
            </a>
        </div>
        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{ route('site.index') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('site.shop') }}">Shop</a>
            </li>
            <li>
                <a href="#" class="label1 rs1" data-label1="hot">Features</a>
            </li>
            <li>
                <a href="{{ route('site.blog') }}">Blog</a>
            </li>
            <li>
                <a href="{{ route('site.about') }}">About</a>
            </li>
            <li>
                <a href="{{ route('site.contact') }}">Contact</a>
            </li>
        </ul>
    </div>
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search" aria-label="Close Search">
                <img src="{{ asset('site/images/icons/icon-close2.png') }}" alt="Close">
            </button>
            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search..." aria-label="Search input">
            </form>
        </div>
    </div>
</header>