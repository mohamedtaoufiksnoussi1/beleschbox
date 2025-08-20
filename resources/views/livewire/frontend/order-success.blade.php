<div>
    @livewire('frontend.includes.header')
    <!-- ========================
          page title
       =========================== -->

       <style>
         .success {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-45px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      </style>
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/page-titles/1.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">Order Status</h1>
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

            <div class="col-sm-3 col-md-3 col-lg-3"> </div>
                <div class="col-sm-6 col-md-6 col-lg-6">

                    <div class="card">
                        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                           <span class="success"> <i class="checkmark">✓</i> </span>
                        </div>
                        <h1>Success</h1>
                        <p>We received your purchase request;<br /> we'll be in touch shortly!</p>
                    </div>
                     <br><br>


                </div><!-- /.col-12 -->
                <div class="col-sm-3 col-md-3 col-lg-3"> </div>
            </div><!-- /.row -->

        </div>
    </section>



    @livewire('frontend.includes.footer')
</div>