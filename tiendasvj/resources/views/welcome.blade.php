@extends('template')

@section('content')


<div class="container">
    <div class="row">
        @foreach($juegos as $key => $juego)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 d-flex flex-column text-center">
                    <img src="{{ asset('img/' . $juego->imagen) }}" class="card-img-top ljuegos-Img" alt="{{ $juego->nombre }}" width="80px" height="80px">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $juego->nombre }}</h5>
                        <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" style="background-color: rgba(24, 20, 104, 0.5)">Ver más información</button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $key }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{ $key }}">{{ $juego->nombre }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('img/' . $juego->imagen) }}" class="ljuegos-Img" alt="{{ $juego->nombre }}">
                            <p><strong>Descripción:</strong> {{ $juego->descripcion }}</p>
                            <p><strong>Precio: Bs.</strong> {{ $juego->precio }}</p>
                            <p><strong>Cantidad de jugadores:</strong> {{ $juego->cantidad_de_jugadores }}</p>
                            <p><strong>Cantidad en stock:</strong> {{ $juego->stock }}</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('carritos.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_juego" value="{{ $juego->id_juego }}">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                @auth
                                <button type="submit" class="btn btn-primary">Agregar a tu carrito</button>
                                @endauth
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if($juegos->isEmpty())
    <p>No se encontraron resultados</p>
@endif
@endsection
