@section('title',$title)

<style>
    /* Header modernisé */
    .header {
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        position: relative;
        z-index: 1000;
    }
    
    /* Topbar modernisé */
    .header-topbar {
        background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .contact__list li {
        margin-right: 2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .contact__list li i {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }
    
    .contact__list li a {
        color: white;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .contact__list li a:hover {
        color: rgba(255, 255, 255, 0.8);
        transform: translateY(-1px);
    }
    
    /* Social icons modernisés */
    .social-icons {
        display: flex;
        gap: 0.75rem;
    }
    
    .social-icons li a {
        width: 32px;
        height: 32px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .social-icons li a:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    
    /* Search modernisé */
    .header-topbar__search {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 0.25rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .header-topbar__search .form-control {
        background: transparent;
        border: none;
        color: white;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
    
    .header-topbar__search .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .header-topbar__search-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
    }
    
    .header-topbar__search-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
    }
    
    /* Navigation principale modernisée */
    .navbar {
        background: white;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(0, 158, 225, 0.1);
    }
    
    .navbar-brand {
        display: flex;
        align-items: center;
    }
    
    .navbar-brand img {
        height: 45px;
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover img {
        transform: scale(1.05);
    }
    
    /* Navigation links modernisés */
    .navbar-nav {
        gap: 2rem;
    }
    
    .nav__item-link {
        color: #2d3748;
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
        padding: 0.5rem 0;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .nav__item-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
        transition: width 0.3s ease;
    }
    
    .nav__item-link:hover::after,
    .nav__item-link.active::after {
        width: 100%;
    }
    
    .nav__item-link:hover {
        color: #009ee1;
        transform: translateY(-1px);
    }
    
    .nav__item-link.active {
        color: #009ee1;
        font-weight: 600;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contact__list li {
            margin-right: 1rem;
            font-size: 0.8rem;
        }
        
        .social-icons {
            gap: 0.5rem;
        }
        
        .social-icons li a {
            width: 28px;
            height: 28px;
        }
    }
</style>

<!-- =========================  Header  =========================== -->
<header class="header header-layout1">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">

                            <li>
                                <i class="icon-phone"></i><a href="tel:+5565454117">{{getAdminProfile()->telephone}}</a>
                            </li>
                            <li>
                                <i class="icon-clock"></i><a
                                    href="{{route('contact')}}">{{getAdminProfile()->openDayFrom}}
                                    - {{getAdminProfile()->closeDayTo}}: {{getAdminProfile()->openTimeFrom}}
                                    - {{getAdminProfile()->closeTimeTo}}</a>
                            </li>
                        </ul><!-- /.contact__list -->
                        <div class="d-flex">
                            <ul class="social-icons list-unstyled mb-0 mr-30">

                                @foreach(getSocialMedia() as $social)
                                    <li><a href="{{$social->url}}" target="_blank"><i
                                                class="fab fa-{{strtolower($social->name)}}"></i></a></li>
                                @endforeach
                            </ul><!-- /.social-icons -->
                            <form class="header-topbar__search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('frontend/assets/images/logo/belesch-logo-light.png')}}" class="logo-light"
                     alt="logo">
                <img src="{{asset('frontend/assets/images/logo/belesch-logo-light.png')}}" class="logo-dark" alt="logo">
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav m-auto">
                    <li class="nav__item">
                        <a href="{{route('home')}}" class="nav__item-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('about')}}" class="nav__item-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('contact')}}" class="nav__item-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contacts</a>
                    </li> <!-- /.nav-item -->

                    @if(\Session::get('Customer'))
                    <li class="nav__item">
                        <a href="{{route('customer-profile')}}" class="nav__item-link">Profile</a>
                    </li> <!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('user.logout')}}" class="nav__item-link">Logout</a>
                    </li> <!-- /.nav-item -->
                    @else
                        <li class="nav__item">
                            <a href="{{route('userLogin')}}" class="nav__item-link">Sign-in</a>
                        </li> <!-- /.nav-item -->
                    @endif

                </ul><!-- /.navbar-nav -->
                <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
            </div><!-- /.navbar-collapse -->
            <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                <!-- Bouton déplacé vers la section des packages -->
            </div>
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
</header><!-- /.Header -->