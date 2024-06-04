@extends('template')

@section('content')


<div class="table-responsive">
    <table class="table table-primary">
        <tbody>
            <tr>
                @foreach($juegos as $key => $juego)
                    @if($key % 4 == 0 && $key != 0)
                        </tr><tr>
                    @endif
                    <td>
                        <center>
                            <img src="{{ asset('img/' . $juego->imagen) }}" alt="" class="ljuegos-Img" width="80px" height="80px"><br><br>
                            {{ $juego->nombre }} <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" style="background-color: rgba(24, 20, 104, 0.5)">
                                Ver más información
                            </button>
                            <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $key }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{ $key }}">{{ $juego->nombre }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="color: #S053A8B;">
                                            <img src="{{ asset('img/' . $juego->imagen) }}" alt="" class="ljuegos-Img"><br>
                                            <strong style="color: black">Descripción:</strong> {{ $juego->descripcion }} <br>
                                            <strong style="color: black">Precio: Bs.</strong> {{ $juego->precio }} <br>
                                            <strong style="color: black">Cantidad de jugadores:</strong> {{ $juego->cantidad_de_jugadores }} <br>
                                            <strong style="color: black">Cantidad en stock:</strong> {{ $juego->stock }}
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
                        </center>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

@if($juegos->isEmpty())
    <p>No se encontraron resultados</p>
@endif
@endsection
