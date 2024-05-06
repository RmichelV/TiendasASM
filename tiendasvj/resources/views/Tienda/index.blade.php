@extends('template')
@section('content')

    <h1><center>Lista de las tiendas </center> </h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
    Agregar nueva tienda 
    </button>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">PROPIETARIO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiendas as $tienda)
                    <tr class="">
                        <td scope="row">{{$tienda->id_tienda}}</td> <!--aqui va el id-->
                        <td> {{$tienda->nombre}} </td>
                        <td> {{$tienda->direccion}} </td>
                        <td> {{$tienda->user->name}} </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar{{$tienda->id_tienda}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$tienda->id_tienda}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('tienda.agregar')
    @include('tienda.info')
@endsection
