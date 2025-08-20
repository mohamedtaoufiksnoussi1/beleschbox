@extends('frontend.layouts.app')
@section('content')
    @livewire('frontend.includes.header')
    <!-- ========================  page title  =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
        <div class="bg-img"><img src="{{asset('frontend/assets/images/page-titles/1.jpg')}}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <h1 class="pagetitle__heading">My Profile</h1>
                </div>
            </div>
        </div>
    </section>
    @livewire('frontend.profile-component')
    @livewire('frontend.includes.footer')
@endsection
