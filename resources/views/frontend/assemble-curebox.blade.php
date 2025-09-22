@extends('frontend.layouts.app')
@section('content')

@php 
// Ne pas charger les données de session par défaut
// Le formulaire sera vide jusqu'à ce qu'une recherche réussie soit effectuée
$customer_sess = [];
@endphp

@livewire('frontend.assemble', ['customer_sess' => $customer_sess, 'steps' => $steps])
@endsection