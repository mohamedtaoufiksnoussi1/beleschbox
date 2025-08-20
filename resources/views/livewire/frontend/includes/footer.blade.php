<!-- ========================  Footer  ========================== -->
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