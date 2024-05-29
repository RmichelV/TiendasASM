@extends('template')
@section('content')

    <h1  class="titulo-j" ><center>Lista de sus VideoJuegos </center> </h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar" style="background-color: rgba(24, 20, 104, 0.5); width: 200px ;height: 50px; display: flex; justify-content: center; align-items: center; font-family: Forte, sans-serif;" >
    Agregar nuevo juego
    </button>
    <br>
    <br>
    <div class="table-responsive " >
        {{-- <table class="table table-primary"> --}}
        <table class="t-juegos">
            {{-- <thead class="table-dark"  > --}}
            <thead class="t-juegos-h"  >
                <tr style="color: white ; font-size:15px; text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000; font-family: 'Broadway', Arial;" >
                    <th scope="col">ID</th><br>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">CANTIDAD DE JUGADORES</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juegos as $juego)
                @if ($juego->id_tienda == auth()->user()->tienda->id_tienda)
                        <tr class="" style="">
                            <td scope="row">{{$juego->id_juego}}</td> <!--aqui va el id-->
                            <td> {{$juego->nombre}} </td>
                            <td> {{$juego->descripcion}} </td>
                            <td> {{$juego->cantidad_de_jugadores}} </td>
                            <td> {{$juego->precio}} </td>
                            <td> {{$juego->stock}} </td>
                            <td> <img src="{{ asset('img/' . $juego->imagen) }}" alt="" srcset="" class="ljuegos-Img"> </td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar{{$juego->id_juego}}" style="background-color: #066F6A">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$juego->id_juego}}" style="background-color: #4D0344">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @include('juego.agregar')
    @include('juego.info')
@endsection
