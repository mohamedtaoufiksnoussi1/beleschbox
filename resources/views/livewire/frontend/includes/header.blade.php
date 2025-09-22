@section('title',$title)

<style>
    /* Header ultra-moderne */
    .header {
        box-shadow: 0 4px 30px rgba(0, 158, 225, 0.15);
        position: relative;
        z-index: 1000;
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
    }
    
    /* Topbar ultra-moderne avec dégradé */
    .header-topbar {
        background: linear-gradient(135deg, #009ee1 0%, #39cdc1 50%, #0077b3 100%);
        padding: 0.12rem 0; /* encore plus fin */
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }
    
    .header-topbar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
        pointer-events: none;
    }
    
    .contact__list li {
        margin-right: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.35rem;
        position: relative;
        z-index: 2;
    }
    
    .contact__list li i {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.65rem;
        background: rgba(255, 255, 255, 0.1);
        padding: 0.12rem;
        border-radius: 50%;
        backdrop-filter: blur(10px);
    }
    
    .contact__list li a {
        color: white;
        font-size: 0.72rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    
    .contact__list li a:hover {
        color: rgba(255, 255, 255, 0.9);
        transform: translateY(-2px);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    /* Social icons ultra-modernes */
    .social-icons {
        display: flex;
        gap: 0.35rem;
        position: relative;
        z-index: 2;
    }
    
    .social-icons li a {
        width: 22px;
        height: 22px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.4s ease;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        font-size: 0.65rem;
    }
    
    .social-icons li a:hover {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
    }
    
    /* Search modernisé */
    .header-topbar__search {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 18px;
        padding: 0.15rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .header-topbar__search .form-control {
        background: transparent;
        border: none;
        color: white;
        padding: 0.3rem 0.6rem;
        font-size: 0.7rem;
    }
    
    .header-topbar__search .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .header-topbar__search-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        font-size: 0.65rem;
    }
    
    .header-topbar__search-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: none;
    }
    
    /* Navigation ultra-moderne */
    .navbar {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(0, 158, 225, 0.1);
        padding: 0.2rem 0;
    }
    
    .navbar-brand img {
        max-height: 82px !important;
        height: 82px !important;
        transition: all 0.3s ease;
        filter: brightness(1.1) contrast(1.1);
    }
    
    .navbar-brand:hover img {
        transform: none;
        filter: brightness(1.15) contrast(1.15);
    }
    
    .nav__item-link {
        color: #2d3748 !important;
        font-weight: 600 !important;
        font-size: 0.8rem !important;
        padding: 0.3rem 0.6rem !important;
        border-radius: 6px !important;
        transition: all 0.3s ease !important;
        position: relative !important;
        text-decoration: none !important;
        display: inline-block !important;
        transform: none !important;
    }
    
    .nav__item-link:hover {
        color: #009ee1 !important;
        background: linear-gradient(135deg, rgba(0, 158, 225, 0.1) 0%, rgba(57, 205, 193, 0.1) 100%) !important;
        transform: none !important;
        box-shadow: 0 3px 12px rgba(0, 158, 225, 0.15) !important;
    }
    
    .nav__item-link.active {
        color: white !important;
        background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%) !important;
        box-shadow: 0 2px 8px rgba(0, 158, 225, 0.2) !important;
        transform: none !important;
    }
    
    .nav__item-link.active::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
        border-radius: 2px;
    }
    
    
    /* Navigation principale modernisée */
    .navbar {
        background: white;
        padding: 0.35rem 0; /* diminue */
        border-bottom: 1px solid rgba(0, 158, 225, 0.1);
    }
    
    .navbar-brand {
        display: flex;
        align-items: center;
    }
    
    .navbar-brand img {
        height: 82px !important; /* assurer 82px effectif */
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover img {
        transform: none;
    }
    
    /* Navigation links modernisés */
    .navbar-nav {
        gap: 1rem; /* plus serré */
    }
    
    .nav__item-link {
        color: #2d3748;
        font-weight: 500;
        font-size: 0.74rem; /* plus petit */
        text-decoration: none;
        padding: 0.25rem 0; /* réduire padding vertical */
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
                                <input type="text" class="form-control" placeholder="Suchen...">
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
                        <a href="{{route('home')}}" class="nav__item-link {{ request()->routeIs('home') ? 'active' : '' }}">Startseite</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('about')}}" class="nav__item-link {{ request()->routeIs('about') ? 'active' : '' }}">Über uns</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('contact')}}" class="nav__item-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontakt</a>
                    </li> <!-- /.nav-item -->

                    @if(\Session::get('Customer'))
                    <li class="nav__item">
                        <a href="{{route('customer-profile')}}" class="nav__item-link">Profil</a>
                    </li> <!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('customer-orders')}}" class="nav__item-link">Meine Bestellungen</a>
                    </li> <!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{route('user.logout')}}" class="nav__item-link">Abmelden</a>
                    </li> <!-- /.nav-item -->
                    @else
                        <li class="nav__item">
                            <a href="{{route('userLogin')}}" class="nav__item-link">Anmelden</a>
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