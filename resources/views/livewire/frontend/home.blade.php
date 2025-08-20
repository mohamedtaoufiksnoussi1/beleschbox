<div>
    @livewire('frontend.includes.header')
    
    <style>
        /* Design professionnel et épuré */
        
        /* Typographie améliorée */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
        }
        
        /* Carrousel principal - Design professionnel */
        .slider {
            position: relative;
            overflow: hidden;
        }
        
        .slide-item {
            position: relative;
            min-height: 500px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 50%, #39cdc1 100%);
        }
        
        .slide-item .bg-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }
        
        .slide-item .bg-img::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0.1) 100%);
            z-index: 2;
        }
        
        .slide-item .bg-img img {
            display: none;
        }
        
        .slide-item .container {
            position: relative;
            z-index: 15;
        }
        
        .slide__content {
            background: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 20;
            backdrop-filter: blur(20px);
            transform: translateY(0);
            transition: all 0.3s ease;
        }
        
        .slide__content:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
        }
        
        .slide__title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .slide__desc {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #2d3748;
            margin-bottom: 2rem;
            font-weight: 500;
        }
        
        /* Section contact - Design professionnel */
        .contact-info {
            background: #f8fafc;
            padding: 3rem 0;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .contact-box {
            background: white;
            border-radius: 6px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
            height: 100%;
        }
        
        .contact-box:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-color: #009ee1;
        }
        
        .contact__icon {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            border-radius: 8px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .contact__icon i {
            color: white;
            font-size: 1.25rem;
        }
        
        .contact__title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        
        .contact__desc {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Section packages - Design professionnel */
        .mainBox-custom {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            padding: 4rem 0;
            position: relative;
        }
        
        .mainBox-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.05) 100%);
        }
        
        .mainBox-custom .heading {
            position: relative;
            z-index: 2;
        }
        
        .mainBox-custom .heading__subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-weight: 500;
        }
        
        .mainBox-custom .heading__title {
            color: white;
            font-size: 2rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }
        
        .boxes {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(0, 158, 225, 0.1);
        }
        
        .boxes:hover {
            box-shadow: 0 12px 35px rgba(0, 158, 225, 0.15);
            transform: translateY(-5px);
            border-color: rgba(0, 158, 225, 0.3);
        }
        
        .boxes h3 {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
        
        .img-style {
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .content-style {
            flex-grow: 1;
        }
        
        .content-style ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .content-style li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: flex-start;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .content-style li:last-child {
            border-bottom: none;
        }
        
        .content-style li i {
            color: #39cdc1;
            margin-right: 0.5rem;
            font-size: 0.8rem;
            margin-top: 0.2rem;
        }
        
        .content-style li strong {
            color: #2d3748;
            font-weight: 600;
        }
        
        /* Boutons professionnels modernisés */
        .btn__primary, .btn__secondary {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .btn__primary {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 158, 225, 0.3);
        }
        
        .btn__primary:hover {
            background: linear-gradient(135deg, #0077b3 0%, #005a8b 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 158, 225, 0.4);
        }
        
        .btn__secondary {
            background: white;
            color: #009ee1;
            border: 2px solid #009ee1;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn__secondary:hover {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 158, 225, 0.3);
        }
        
        /* Bouton principal Assemble Curebox */
        .btn__secondary.btn-lg {
            background: white;
            color: #009ee1;
            border: 3px solid white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .btn__secondary.btn-lg:hover {
            background: linear-gradient(135deg, #009ee1 0%, #0077b3 100%);
            color: white;
            border-color: #009ee1;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 158, 225, 0.4);
        }
        
        /* Animations subtiles */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        
        /* Responsive design professionnel */
        @media (max-width: 768px) {
            .slide__title {
                font-size: 2rem;
            }
            
            .slide__content {
                padding: 2rem;
                margin: 1rem;
            }
            
            .contact-box {
                margin-bottom: 1.5rem;
            }
            
            .boxes {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <!-- ============================  Sliders ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0"
             data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear", "autoplay": true, "autoplaySpeed": 2000, "infinite": true, "pauseOnHover": false, "pauseOnFocus": false}'>
            @foreach(getSlider() as $slider)
                <div class="slide-item align-v-h">
                    <div class="bg-img"><img src="{{asset('storage/'.$slider->image)}}" alt="{{$slider->altTag}}"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                                            <div class="slide__content fade-in">
                                <h2 class="slide__title">{{$slider->heading}}</h2>
                                <p class="slide__desc">{{$slider->title}}</p>
                            </div><!-- /.slide-content -->
                            </div><!-- /.col-xl-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.slide-item -->
            @endforeach
        </div><!-- /.carousel -->
    </section>
    <!-- /.slider -->

    <!-- ============================  contact info  ============================== -->
    <section class="contact-info py-0">
        <div class="container">
            <div class="row row-no-gutter boxes-wrapper">
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex fade-in" style="animation-delay: 0.2s;">
                        <div class="contact__icon">
                            <i class="icon-call3"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Lorem Ipsum</h2>
                            <p class="contact__desc">Lorem Ipsum is simply has survived not only five centuries looking
                                at its layout the point of using.</p>
                            <a href="tel:+201061245741" class="phone__number">
                                <i class="icon-phone"></i> <span>01061245741</span>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex fade-in" style="animation-delay: 0.4s;">
                        <div class="contact__icon">
                            <i class="icon-health-report"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Lorem Ipsum</h2>
                            <p class="contact__desc">Lorem Ipsum is simply has survived not only five centuries looking
                                at its layout the point of using.</p>
                            <a href="#" class="btn btn__white btn__outlined btn__rounded">
                                <span>Lorem Ipsum</span><i class="icon-arrow-right"></i>
                            </a>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-sm-12 col-md-4">
                    <div class="contact-box d-flex fade-in" style="animation-delay: 0.6s;">
                        <div class="contact__icon">
                            <i class="icon-heart2"></i>
                        </div><!-- /.contact__icon -->
                        <div class="contact__content">
                            <h2 class="contact__title">Lorem Ipsum</h2>
                            <ul class="time__list list-unstyled mb-0">
                                <li><span>Monday - Friday</span><span>8.00 - 7:00 pm</span></li>
                                <li><span>Saturday</span><span>9.00 - 10:00 pm</span></li>
                                <li><span>Sunday</span><span>10.00 - 12:00 pm</span></li>
                            </ul>
                        </div><!-- /.contact__content -->
                    </div><!-- /.contact-box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.contact-info -->
    <section class="mainBox-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center mb-60">
                        <h2 class="heading__subtitle">Aus folgenden Pflege-Paketen können Sie auswählen:</h2>
                        <h3 class="heading__title text-white">Aus folgenden Pflege-Paketen können Sie auswählen:</h3>
                    </div>
                </div>
                @foreach(getAllPackages() as $package)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="boxes fade-in" style="display: flex; flex-direction: column; border-radius: 8px; width: 100%; animation-delay: {{ $loop->index * 0.1 }}s;">
                        <h3>{{$package->name}}</h3>
                        <div class="img-style">
                            <img src="{{asset('storage/'.$package->image)}}" alt="{{$package->altTag}}" class="img-fluid">
                        </div>

                        <div class="content-style" style="flex-grow: 1">
                            <ul>
                                @foreach($package->get_packageDetails as $packageProduct)
                                <li><i class="fa fa-check"></i> <strong> {{$packageProduct->getProductDetails->product_title}}</strong> {{$packageProduct->getProductDetails->name}}</li>
                                    @endforeach
                            </ul>
                        </div>

                        <a href="{{url('assemble-pkg?package='.$package->id)}}" class="btn btn__secondary btn__outlined btn__rounded" tabindex="-1">
                            <span>Paket auswählen</span>
                            <i class="icon-arrow-right"></i>
                        </a>

                        <!-- @if(\Session::get('Customer'))
                        <a href="{{route('assemble-package',[$package->id])}}" class="btn btn__secondary btn__outlined btn__rounded" tabindex="-1">
                            <span>Paket auswählen</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        @else

                       
                        <a href="{{route('userLogin')}}" class="btn btn__secondary btn__outlined btn__rounded" tabindex="-1">
                            <span>Paket auswählen</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                        @endif -->
                        
                    </div>
                </div>
                @endforeach
           </div>
           
           <!-- Bouton Assemble Curebox déplacé ici -->
           <div class="row mt-5">
               <div class="col-12 text-center">
                   <a href="{{route('assemble')}}" class="btn btn__secondary btn__rounded btn-lg" style="font-size: 1.2rem; padding: 1.2rem 3.5rem; background: white; color: #009ee1; border: 3px solid white; box-shadow: 0 8px 25px rgba(0,0,0,0.15); font-weight: 600;">
                       <i class="icon-container mr-2"></i>
                       <span>Assemble Curebox</span>
                   </a>
               </div>
           </div>
        </div>
    </section>
    <!-- ========================  About Layout 2 =========================== -->
    <section class="about-layout2 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-60">{{getAbout()->about_heading}}</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="text-with-icon">
                        <div class="text__icon">
                            <i class="icon-doctor"></i>
                        </div>
                        <div class="text__content">
                            <p class="heading__desc font-weight-bold color-secondary mb-30">{{getAbout()->about_title}}</p>
                            <a href="#" class="btn btn__secondary btn__rounded mb-70">
                                <span>Assemble curabox</span> <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="video-banner-layout2 bg-overlay">
                        <img src="{{asset('storage/'.getAbout()->video_cover)}}" alt="about" class="w-100">
                        <a class="video__btn video__btn-white popup-video"
                           href="{{getAbout()->video}}">
                            <div class="video__player">
                                <i class="fa fa-play"></i>
                            </div>
                            <span class="video__btn-title color-white">Watch Our Video!</span>
                        </a>
                    </div><!-- /.video-banner -->
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="about__text bg-white">
                        {!! getAbout()->about_contents !!}
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.About Layout 2 -->

    <!-- ======================== Modern Products Section =========================== -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="section-header">
                        <h2>{{ __('website.quality_products') }}</h2>
                        <p>{{ __('website.quality_products_desc') }}</p>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                         data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    @foreach(getAllProducts() as $qualityPtoduct)
                        <!-- Product item -->
                            <div class="service-item">
                                <div class="product-card modern-card h-100">
                                    <div class="service__icon p-4">
                                        <img src="{{asset('storage/'.$qualityPtoduct->image)}}"
                                             class="img-fluid rounded" alt="{{$qualityPtoduct->name}}">
                                    </div><!-- /.service__icon -->
                                    <div class="service__content p-4">
                                        <h4 class="service__title h5 mb-3">{{$qualityPtoduct->name}}</h4>
                                        <div class="service__desc text-muted">{!! $qualityPtoduct->contents !!}</div>
                                        <a href="{{route('assemble')}}" class="btn btn-modern btn-sm mt-3">
                                            <i class="icon-arrow-right mr-2"></i>{{ __('website.add_to_cart') }}
                                        </a>
                                    </div><!-- /service__content -->
                                </div><!-- /.product-card -->
                            </div><!-- /service-item -->
                        @endforeach
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
    </section>
    <!-- /.Services Layout 1 -->


    <!-- ======================  Features Layout 2 ========================= -->
    <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/backgrounds/2.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="heading__layout2 mb-50">
                        <h3 class="heading__title color-white">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry.</h3>
                    </div>
                </div><!-- /col-lg-5 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- Feature item #1 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('frontend/assets/images/services/1.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-heart"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #2 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('frontend/assets/images/services/2.jpg')}}" alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-doctor"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #3 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('frontend/assets/images/services/electric-van-courier.jpg')}}"
                                 alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-ambulance"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #4 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img
                                src="{{asset('frontend/assets/images/services/idea_sized-kendal-l4ikccachoc-unsplash.jpg')}}"
                                alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-drugs"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #5 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img
                                src="{{asset('frontend/assets/images/services/iStock-153061623-thumb.jpg')}}"
                                alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-first-aid-kit"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #6 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img src="{{asset('frontend/assets/images/services/electric-van-courier.jpg')}}"
                                 alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-hospital"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #7 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img
                                src="{{asset('frontend/assets/images/services/senior-woman-caregiver-home-portrait-women-sitting-care-nurse-giving-medication-to-elderly-63341478.jpg')}}"
                                alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-expenses"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
                <!-- Feature item #8 -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="feature-item">
                        <div class="feature__img">
                            <img
                                src="{{asset('frontend/assets/images/services/young-woman-serving-dinner-elderly-living-room-senior-people-care-171932883.jpg')}}"
                                alt="service" loading="lazy">
                        </div><!-- /.feature__img -->
                        <div class="feature__content">
                            <div class="feature__icon">
                                <i class="icon-bandage"></i>
                            </div>
                            <h4 class="feature__title">Lorem Ipsum is simply dummy</h4>
                        </div><!-- /.feature__content -->
                        <a href="#" class="btn__link">
                            <i class="icon-arrow-right icon-outlined"></i>
                        </a>
                    </div><!-- /.feature-item -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.Features Layout 2 -->

    <!-- ======================  Team ========================= -->
    <section class="team-layout2 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <div class="heading text-center mb-40">
                        <h3 class="heading__title">Meet Our Team</h3>
                        <p class="heading__desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry.
                        </p>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                         data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    @foreach(getTeam() as $team)
                        <!-- Member  -->
                            <div class="member">
                                <div class="member__img">
                                    <img src="{{asset('storage/'.$team->image)}}"
                                         alt="member img" style="height: 370px; object-fit: cover;">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><a href="javascript:;">{{$team->name}}</a></h5>
                                    <p class="member__job">{{$team->heading}}</p>
                                    <p class="member__desc">{{$team->description}}</p>
                                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                        <a href="javascript:;" class="btn btn__secondary btn__link btn__rounded">
                                            <span>Read More</span>
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                        <ul class="social-icons list-unstyled mb-0">
                                            <li><a href="{{$team->facebook}}" target="_blank" class="facebook"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{$team->facebook}}" class="twitter" target="_blank"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li><a href="tel:{{$team->mobile}}" class="phone"><i
                                                        class="fas fa-phone-alt"></i></a></li>
                                        </ul><!-- /.social-icons -->
                                    </div>
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                        @endforeach
                    </div><!-- /.carousel -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.Team -->


    <!-- ==========================  contact layout 3 =========================== -->
    <section class="contact-layout3 bg-overlay bg-overlay-primary-gradient pb-60">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/banners/3.jpg')}}" alt="banner"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="contact-panel mb-50">
                        <form class="contact-panel__form" id="contactForm" onsubmit="sendMail(); return false;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">Drop Your Query</h4>
                                    <p class="contact-panel__desc mb-30">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since.
                                    </p>
                                </div>
                            {{--<div class="col-sm-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                <i class="icon-widget form-group-icon"></i>
                                <select class="form-control">
                                  <option value="0">Choose Clinic</option>
                                  <option value="1">Pathology Clinic</option>
                                  <option value="2">Pathology Clinic</option>
                                </select>
                              </div>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <div class="form-group">
                                <i class="icon-user form-group-icon"></i>
                                <select class="form-control">
                                  <option value="0">Choose Doctor</option>
                                  <option value="1">Ahmed Abdallah</option>
                                  <option value="2">Mahmoud Begha</option>
                                </select>
                              </div>
                            </div> --}}
                            <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Full Name"
                                               id="contact-fname" name="contact-Fname"
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Phone" id="contact-phone"
                                               name="contact-phone" required>
                                    </div>
                                </div>
								<!-- /.col-lg-6 -->
								<!--
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Last Name"
                                               id="contact-lname" name="contact-Lname"
                                               required>
                                    </div>
                                </div> --><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <i class="icon-email form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email" id="contact-email"
                                               name="contact-email" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
								<!-- /.col-lg-6 -->
                                <!--div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group form-group-date">
                                        <i class="icon-calendar form-group-icon"></i>
                                        <input type="date" class="form-control" id="contact-date" name="contact-date"
                                               required>
                                    </div>
                                </div><!-- /.col-lg-4 -->
                                <!-- <div class="col-sm-4 col-md-4 col-lg-4">
                                  <div class="form-group form-group-date">
                                    <i class="icon-clock form-group-icon"></i>
                                    <input type="time" class="form-control" id="contact-time" name="contact-time" required>
                                  </div>
                                </div> --><!-- /.col-lg-4 -->
								<div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message" id="contact-message" name="contact-message" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                            class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Submit</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    <!-- <div class="contact-result"></div> -->
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div>
                </div><!-- /.col-lg-7 -->
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="heading heading-light mb-30">
                        <h3 class="heading__title mb-30">Lorem Ipsum is simply dummy text !!</h3>
                        <p class="heading__desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since.
                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{route('assemble')}}" class="btn btn__white btn__rounded mr-30">
                            <i class="fas fa-heart"></i> <span>Make A Box</span>
                        </a>
                        <a class="video__btn video__btn-white popup-video"
                           href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                            <div class="video__player">
                                <i class="fa fa-play"></i>
                            </div>
                            <span class="video__btn-title color-white">Play Video</span>
                        </a>
                    </div>

                    <div class="slick-carousel mt-20"
                         data-slick='{"slidesToShow": 3, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
                        @foreach(getAllPartners() as $client)
                            <div class="client">
                                <img src="{{asset('storage/'.$client->image)}}" alt="{{$client->altTag}}"
                                     title="{{$client->titleTag}}">
                                <img src="{{asset('storage/'.$client->image)}}" alt="{{$client->altTag}}"
                                     title="{{$client->titleTag}}">
                            </div><!-- /.client -->
                        @endforeach
                    </div><!-- /.carousel -->
                </div><!-- /.col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.contact layout 3 -->


    <!-- =========================   Testimonials layout 2  =========================  -->
    <section class="testimonials-layout2 pt-130 pb-40">
        <div class="container">
            <div class="testimonials-wrapper">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading-layout2">
                            <h3 class="heading__title">Clients words</h3>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-5 -->
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="slider-with-navs">
                        @foreach(getTestimonial() as $testimonial)
                            <!-- Testimonial -->
                                <div class="testimonial-item">
                                    <h3 class="testimonial__title">“{{$testimonial->message}}”
                                    </h3>
                                </div><!-- /. testimonial-item -->
                            @endforeach
                        </div><!-- /.slick-carousel -->
                        <div class="slider-nav mb-60">
                            @foreach(getTestimonial() as $testimonials)
                                <div class="testimonial__meta">
                                    <div class="testimonial__thmb">
                                        <img src="{{asset('storage/'.$testimonials->image)}}" alt="{{$testimonials->altTag}}" style="width: 100%; height: 100%; object-fit: cover">
                                    </div><!-- /.testimonial-thumb -->
                                    <div>
                                        <h4 class="testimonial__meta-title">{{$testimonials->name}}</h4>
                                        <p class="testimonial__meta-desc">{{$testimonials->designation}}</p>
                                    </div>
                                </div><!-- /.testimonial-meta -->
                            @endforeach
                        </div><!-- /.slider-nav -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.testimonials-wrapper -->
        </div><!-- /.container -->
    </section>
    <!-- /.testimonials layout 2 -->

    <!-- ========================  gallery  =========================== -->
    <section class="gallery pt-0 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                         data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        @foreach(getGallery() as $gallery)
                            <a class="popup-gallery-item" href="{{asset('storage/'.$gallery->image)}}" style="display: block;">
                                <img src="{{asset('storage/'.$gallery->image)}}" alt="{{$gallery->altTag}}" style="height: 200px; object-fit: cover;">
                            </a>
                        @endforeach
                    </div><!-- /.gallery-images-wrapper -->
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- /.gallery 2 -->

    @livewire('frontend.includes.footer')
</div>