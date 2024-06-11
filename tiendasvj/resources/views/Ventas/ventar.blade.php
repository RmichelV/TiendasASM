@extends('template')
@section('content')
    <div class="venta-r">

        <img src="{{asset('img/venta.avif')}}" class="ventar" alt="">
        <h1>venta realizada</h1>
        
    </div>
    <a href="{{url('detalle_ventas')}}"><button>Registrar otra venta </button></a>
@endsection