@extends('template')
@section('content')

@php
    $user = Auth::User();
@endphp

    <div class="wlc">
        <img src="{{asset('img/img-wlc.webp')}}" alt="">
        <h1>Bienvenido {{$user->name}}</h1>
    </div>

    
@endsection