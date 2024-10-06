<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <br>
                <a href="{{route('admin.profile')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                  <a href="{{route('logout')}}" onclick="event.preventDefault();
                  this.closest('form').submit();"class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
                  </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="#"><i class="fas fa-fire"></i>Dashboard</a></li>
            <li class=active><a class="nav-link" href="{{route('sliderHomePage.index')}}"><i class="fas fa-image"></i>Slider-Homepage</a></li>
            <li class=active><a class="nav-link" href="{{route('about.index')}}"><i class="fas fa-user"></i>About</a></li>


            {{--  Manage Product-category  --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Products Beheren</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('category.index')}}">Category</a></li>
                    <li><a class="nav-link" href="{{route('products.index')}}">Products</a></li>
                    <li><a class="nav-link" href="{{route('menupage.index')}}">Menu-pagina</a></li>
                    <li><a class="nav-link" href="{{route('coupon.index')}}">Coupons</a></li>
                </ul>
            </li>

            {{--  Manage the bestellen  --}}
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-clock-o"></i>
                    <span>Manage-Bestellen</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('orders.index')}}">Alle-bestelen</a></li>
                    <li><a class="nav-link" href="{{route('reservation.index')}}">Reserveren-Klanten</a></li>
                </ul>
            </li>


            {{--  Manage Resevaion  --}}
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-clock-o"></i>
                    <span>Manage-Reservation</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('reservation-time.index')}}">Reserveren-tijd</a></li>
                    <li><a class="nav-link" href="{{route('reservation.index')}}">Reserveren-Klanten</a></li>
                </ul>
            </li>

            <li class=active><a class="nav-link" href="{{ route('payment-settings') }}"><i class="fa fa-bank"></i>Payment Settings</a></li>
            <li class=active><a class="nav-link" href="{{ route('delivery.index') }}"><i class="fa fa-motorcycle"></i>Bezorg</a></li>
            <li class=active><a class="nav-link" href="{{ route('settings.index')}}"><i class="fas fa-user"></i>Genaral-Setting</a></li>




        </ul>


    </aside>
</div>
