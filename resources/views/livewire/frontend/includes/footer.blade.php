<!-- ========================  Footer  ========================== -->
<style>
    /* ===== MODERN FOOTER STYLES ===== */
    :root {
        --sky-blu: #009ee1;
        --turquoise: #39cdc1;
        --blue-gradient: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%);
        --blue-gradient-hover: linear-gradient(135deg, #0088cc 0%, #2fb8b0 100%);
        --light-blue: #e3f2fd;
        --dark-blue: #0056b3;
        --white: #ffffff;
        --footer-bg: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
        --footer-text: #e2e8f0;
        --footer-link: #cbd5e0;
        --footer-link-hover: #ffffff;
        --border-radius: 12px;
        --shadow: 0 4px 20px rgba(0, 158, 225, 0.15);
        --shadow-hover: 0 8px 30px rgba(0, 158, 225, 0.25);
    }
    
    .footer {
        background: var(--footer-bg) !important;
        color: var(--footer-text) !important;
        position: relative;
        overflow: hidden;
        padding: 0 !important;
        margin: 0 !important;
    }
    
    body .footer {
        background: var(--footer-bg) !important;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(0, 158, 225, 0.1) 0%, rgba(57, 205, 193, 0.1) 100%);
        pointer-events: none;
    }
    
    .footer-primary {
        padding: 6px 0 4px !important;
        position: relative;
        z-index: 1;
        background: transparent !important;
        display: flex;
        align-items: center;
        min-height: 30vh;
    }
    
    body .footer .footer-primary {
        padding: 6px 0 4px !important;
    }
    
    .footer-widget__title {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        font-weight: 700 !important;
        font-size: 8px !important;
        margin-bottom: 3px !important;
        position: relative;
        color: transparent !important;
    }
    
    body .footer .footer-widget__title {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        font-size: 8px !important;
        margin-bottom: 3px !important;
        color: transparent !important;
    }
    
    /* Fallback pour les navigateurs qui ne supportent pas background-clip */
    .footer-widget__title {
        color: var(--sky-blu) !important;
    }
    
    .footer-widget__title[style*="background"] {
        color: transparent !important;
    }
    
    .footer-widget__title::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 25px;
        height: 2px;
        background: var(--blue-gradient);
        border-radius: 2px;
    }
    
    .footer-widget-about p {
        color: var(--footer-text) !important;
        line-height: 1.2 !important;
        margin-top: 3px !important;
        font-size: 10px !important;
    }
    
    .footer-widget-about img {
        max-width: 120px !important;
        height: auto !important;
        filter: brightness(1.2) contrast(1.1) !important;
        transition: all 0.3s ease !important;
    }
    
    .footer-widget-about img:hover {
        filter: brightness(1.4) contrast(1.2) !important;
        transform: scale(1.05) !important;
    }
    
    body .footer .footer-widget-about p {
        font-size: 10px !important;
        line-height: 1.2 !important;
        margin-top: 3px !important;
    }
    
    .footer-widget-nav ul li {
        margin-bottom: 1px !important;
    }
    
    .footer-widget-nav ul li:first-child {
        margin-top: 8px !important;
    }
    
    .footer-widget-nav ul li a {
        color: var(--footer-link) !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        font-weight: 500 !important;
        font-size: 10px !important;
        position: relative;
    }
    
    body .footer .footer-widget-nav ul li a {
        font-size: 10px !important;
        margin-bottom: 2px !important;
        color: var(--footer-link) !important;
    }
    
    .footer-widget-nav ul li a:hover {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        transform: translateX(3px) !important;
    }
    
    .footer-widget-contact {
        background: linear-gradient(135deg, var(--white) 0%, rgba(255, 255, 255, 0.95) 100%) !important;
        padding: 10px !important;
        border-radius: var(--border-radius) !important;
        box-shadow: var(--shadow) !important;
        border-left: 3px solid transparent !important;
        background-image: linear-gradient(135deg, var(--white) 0%, rgba(255, 255, 255, 0.95) 100%), var(--blue-gradient) !important;
        background-origin: border-box !important;
        background-clip: content-box, border-box !important;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 100%;
    }
    
    body .footer .footer-widget-contact {
        padding: 10px !important;
        background: linear-gradient(135deg, var(--white) 0%, rgba(255, 255, 255, 0.95) 100%) !important;
    }
    
    .footer-widget-contact::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--blue-gradient);
        opacity: 0.1;
        border-radius: 50%;
        transform: translate(30px, -30px);
    }
    
    .footer-widget-contact .footer-widget__title {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        margin-bottom: 6px !important;
        font-size: 11px !important;
    }
    
    .contact-list li {
        color: var(--dark-blue) !important;
        margin-bottom: 4px !important;
        line-height: 1.2 !important;
        font-size: 10px !important;
    }
    
    .phone__number {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        font-size: 12px !important;
    }
    
    .phone__number:hover {
        background: var(--turquoise) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
    }
    
    .social-icons {
        display: flex !important;
        gap: 5px !important;
        margin-top: 6px !important;
    }
    
    .social-icons li a {
        width: 24px !important;
        height: 24px !important;
        background: var(--blue-gradient) !important;
        color: var(--white) !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        box-shadow: var(--shadow) !important;
    }
    
    .social-icons li a:hover {
        transform: translateY(-3px) !important;
        box-shadow: var(--shadow-hover) !important;
        background: var(--blue-gradient-hover) !important;
    }
    
    .footer-secondary {
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 158, 225, 0.1) 50%, rgba(57, 205, 193, 0.1) 100%) !important;
        padding: 2px 0 !important;
        border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
        position: relative;
        z-index: 1;
    }
    
    body .footer .footer-secondary {
        padding: 2px 0 !important;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 158, 225, 0.1) 50%, rgba(57, 205, 193, 0.1) 100%) !important;
    }
    
    .footer-secondary span,
    .footer-secondary a {
        color: var(--footer-text) !important;
        font-size: 8px !important;
    }
    
    .footer-secondary a:hover {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
    }
    
    .footer__copyright-links li {
        margin-left: 12px !important;
    }
    
    .footer__copyright-links li a {
        color: var(--footer-link) !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        font-size: 10px !important;
    }
    
    .footer__copyright-links li a:hover {
        background: var(--blue-gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
    }
    
    #scrollTopBtn {
        position: fixed !important;
        bottom: 12px !important;
        right: 12px !important;
        width: 35px !important;
        height: 35px !important;
        background: var(--blue-gradient) !important;
        color: var(--white) !important;
        border: none !important;
        border-radius: 50% !important;
        box-shadow: var(--shadow) !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        z-index: 1000 !important;
    }
    
    #scrollTopBtn:hover {
        transform: translateY(-3px) !important;
        box-shadow: var(--shadow-hover) !important;
    }
    
    @media (max-width: 768px) {
        .footer-primary {
            padding: 10px 0 8px !important;
        }
        
        .footer-widget-contact {
            margin-top: 10px !important;
        }
        
        .social-icons {
            justify-content: center !important;
        }
    }
    
    /* FORCE APPLICATION - OVERRIDE ALL OTHER STYLES */
    .footer * {
        box-sizing: border-box !important;
    }
    
    .footer .container {
        max-width: 100% !important;
    }
    
    .footer .row {
        margin: 0 !important;
    }
    
    .footer .col-sm-12,
    .footer .col-md-12,
    .footer .col-lg-3,
    .footer .col-lg-2,
    .footer .col-lg-4 {
        padding: 0 15px !important;
    }
    
    /* FORCER LES COULEURS DÉGRADÉES */
    .footer h6,
    .footer .footer-widget__title {
        background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        color: transparent !important;
    }
    
    .footer a:hover {
        background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
    }
</style>

<footer class="footer">
    <div class="footer-primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="footer-widget-about">
                        <img src="{{asset('frontend/assets/images/logo/belesch-logo-light.png')}}" alt="logo" class="mb-30">
                        <img src="{{asset('frontend/assets/images/logo/MedicCos_Inko_and_Care.png')}}" alt="logo" class="ml-30 mb-0">
                        <p class="color-gray">{!! substr(getAbout()->about_contents, 0, 170) !!}</p>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-xl-2 -->
                <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
                    <div class="footer-widget-nav">
                        <h6 class="footer-widget__title">Useful links</h6>
                        <nav>
                            <ul class="list-unstyled">
                                @foreach(getUsefulLink() as $useful)
                                <li><a href="{{$useful['fullUrl']}}" target="_blank">{{$useful['name']}}</a></li>
                                @endforeach
                                <li><a href="#" class="text-decoration-none">MedicCos Inkontinenzhilfe</a></li>
                                <li><a href="#" class="text-decoration-none">Link2</a></li>
                                <li><a href="#" class="text-decoration-none">Link3</a></li>
                                <li><a href="#" class="text-decoration-none">Link4</a></li>
                                <li><a href="#" class="text-decoration-none">Link5</a></li>
                            </ul>
                        </nav>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-6 col-md-6 col-lg-2">
                    <div class="footer-widget-nav">
                        <h6 class="footer-widget__title">Links</h6>
                        <nav>
                            <ul class="list-unstyled">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                <li><a href="{{route('assemble')}}">Assemble Curebox</a></li>
                                <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('cookie')}}">Cookie</a></li>
                            </ul>
                        </nav>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="footer-widget-contact">
                        <h6 class="footer-widget__title color-heading">Quick Contacts</h6>
                        <ul class="contact-list list-unstyled">
                            <li>If you have any questions or need help, feel free to contact with our team.</li>
                            <li>
                                <a href="tel:01061245741" class="phone__number">
                                    <i class="icon-phone"></i> <span>{{getAdminProfile()->telephone}}</span>
                                </a>
                            </li>
                            <li class="color-body">Lorem Ipsum is simply dummy text of the printing.</li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <!-- <a href="contact-us.html" class="btn btn__primary btn__link mr-30">
                              <i class="icon-arrow-right"></i> <span>Get Directions</span>
                            </a> -->
                            <ul class="social-icons list-unstyled mb-0">
                                @foreach(getSocialMedia() as $social)
                                    <li><a href="{{$social->url}}" target="_blank"><i class="fab fa-{{strtolower($social->name)}}"></i></a></li>
                                @endforeach
                            </ul><!-- /.social-icons -->
                        </div>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-primary -->
    <div class="footer-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <span class="fz-14">&copy; {{ date('Y') }} {{env('APP_NAME')}} , All Rights Reserved. </span>
                    <span>Designed by <a class="fz-14 color-primary" href="#">infoicon technology</a></span>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <nav>
                        <ul class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end mb-0">
                            <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('cookie')}}">Cookies</a></li>
                        </ul>
                    </nav>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-secondary -->
</footer><!-- /.Footer -->
<button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>