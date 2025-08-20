@extends('admin.layouts.app')
@section('content')
    <script src="{{asset('admin/js/app.js')}}"></script>
    @livewire('admin.gallery-component')
@endsection
