@extends('frontend.layouts.app')
@section('content')
    @livewire('frontend.includes.header')
    <!-- ========================  page title  =========================== -->
    <section class="page-title page-title-layout1" style="background: linear-gradient(135deg, #009ee1 0%, #39cdc1 100%); padding: 18px 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading" style="color: white; text-shadow: 0 2px 4px rgba(0,0,0,0.1); font-size: 1.35rem; margin: 0;">
                        <i class="fas fa-shopping-bag me-2"></i>
                        Meine Bestellungen
                    </h1>
                </div>
            </div>
        </div>
    </section>
    @livewire('frontend.user-orders-component')
    @livewire('frontend.includes.footer')
@endsection
