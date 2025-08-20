@extends('frontend.layouts.app')
@section('content')

@php 
if(Session::get('Customer'))
{
$customer_sess = Session::get('Customer');
} else
{
    $customer_sess = [];
}
@endphp

@livewire('frontend.assemble', ['customer_sess' => $customer_sess, 'steps' => $steps])
@endsection