<div>
    @livewire('frontend.includes.header')
    <!-- ========================  page title  =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/page-titles/1.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">Privacy - Policy</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================  About Layout 1 =========================== -->
    <section class="about-layout1 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 ">
                    <div class="heading-layout2">
                        {!! getSetting()->privacy !!}
                    </div><!-- /heading -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div>
    </section>
    @livewire('frontend.includes.footer')
</div>
