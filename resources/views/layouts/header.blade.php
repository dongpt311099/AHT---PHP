<div class="header">
    <div class="header-top">
        <div class="container-fluid">
            <div class="header-top-inner">
                <div class="header-top-inner-item welcome">
                    <div class="bookmark"><i class="far fa-bookmark"></i></div>
                    <div class="text-welcome">Welcome to Franco - an e-Commerce PSD Template</div>
                </div>
                <div class="header-top-inner-item header-top-shop">
                    @guest
                    <div class="shop-setting-lock">
                        <div class="icon icon-lock"><i class="fas fa-lock"></i></div>
                        <div class="text text-lock"><a href="{{ url('login') }}" style="color: #525252">Member Login</a></div>
                    </div>
                    @endguest
                    @auth
                    <div class="shop-setting-lock">
                        <div class="icon icon-lock"><i class="fas fa-history"></i></div>
                        <div class="text text-lock"><a href="{{ url('myOrder') }}" style="color: #525252">My Order</a></div>
                    </div>
                    <div class="shop-setting-top">
                        <div class="icon icon-setting"><i class="far fa-user"></i></div>
                        <div class="text text-setting"><a href="#" style="color: #525252">{{ Auth::user()->name }}</a></div>
                    </div>
                    <div class="shop-setting-lock">
                        <div class="icon icon-lock"><i class="fas fa-sign-out-alt"></i></div>
                        <div class="text text-lock"><a href="{{ url('logout') }}" style="color: #525252">Logout</a></div>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="header-bottom-inner">
                <!-- menu-mobie -->
                <div class="mobile-menu">
                    <a id="mobile-menu" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <!-- end menu-mobie -->
                <div class="navbar-logo">
                    <img src="images/logo.jpg" alt="">
                </div>
                <div class="navbar-inner menu" id="main-menu">
                    <nav>
                        <ul class="navbar">
                            <li class="nav-item active"><a href="/home">HOME</a></li>
                            <li class="nav-item"><a href="#">WOMEN</a></li>
                            <li class="nav-item"><a href="#">MEN</a></li>
                            <li class="nav-item"><a href="#">ABOUT US</a></li>
                            <li class="nav-item"><a href="#">BLOG</a></li>
                            <li class="nav-item"><a href="/collections">COLLECTIONS</a></li>
                            <li class="nav-item"><a href="#">CONTACT</a></li>
                            <li class="nav-item"><a class="nav-item nav-search" href="#"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="navbar-tool">
                    
                    @guest
                    <a class="navbar-tool-item wishlist-icon" href="#"><i class="pe-7s-like"></i></a>
                    <a class="navbar-tool-item cart-icon" href="{{ url('login') }}"><i class="pe-7s-cart"></i></a>
                    @endguest
                    @auth
                    <a class="navbar-tool-item cart-icon" href="/cart"><i class="pe-7s-cart"></i></a>
                    <div class="cart-quantity">{{ $cart }}</div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>