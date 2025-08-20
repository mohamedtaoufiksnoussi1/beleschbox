<div>
    @livewire('frontend.includes.header')
    <!-- ========================
          page title
       =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/page-titles/1.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">{{getAbout()->header_heading}}</h1>
                    <p class="pagetitle__desc">{{getAbout()->header_content}}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
      About Layout 1
    =========================== -->
    <section class="about-layout1 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="heading-layout2">
                        <h3 class="heading__title mb-40">{{getAbout()->about_heading}}</h3>
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about__Text">
                        <p class="mb-30">{!! getAbout()->about_title !!} </p>
                        <p class="mb-30">{!! getAbout()->about_contents !!} </p>
                        <!-- <div class="d-flex align-items-center mb-30">
                          <a href="doctors-grid.html" class="btn btn__primary btn__outlined btn__rounded mr-30">
                            Meet Our Doctors</a>
                          <img src="assets/images/about/singnture.png" alt="singnture">
                        </div> -->
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="video-banner">
                        <img src="{{asset('frontend/assets/images/about/1.jpg')}}" alt="about">
                        <a class="video__btn video__btn-white popup-video"
                           href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                            <div class="video__player">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======================
    Features Layout 1
    ========================= -->


    <!-- =========================
   Testimonials layout 2
   =========================  -->
   
    <section class="testimonials-layout2 pt-130 pb-40">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/backgrounds/1.jpg')}}" alt="background"></div>
        
        <div class="container">
            <div class="testimonials-wrapper">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading-layout2">
                            <h3 class="heading__title">Kundenmeinungen</h3>
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
                                        <img src="{{asset('storage/'.$testimonials->image)}}"
                                             alt="{{$testimonials->altTag}}">
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
    </section><!-- /.testimonials layout 2 -->


    @livewire('frontend.includes.footer')
</div>
