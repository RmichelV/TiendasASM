@extends('template')
@section('content')

<center><h1>Lista de tus juegos por comprar</h1></center>
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Juego</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $userId=Auth::User();
                    $ini = 1;
                @endphp
                @foreach ($carritos as $carrito)
                    @if ($userId->id==$carrito->user_id)
                    <tr class="">
                        <td scope="row">{{$ini++}}</td>
                        @foreach($carrito->juego as $juego)
                            <td> {{$juego->nombre}}</td>
                        @endforeach
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$carrito->id_carrito}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{url('mpago')}}"><button type="button" class="btn btn-success">Comprar</button></a>
    @include('carrito.info')
@endsection