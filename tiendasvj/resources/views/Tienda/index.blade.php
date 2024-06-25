@extends('template')
@section('content')

    <h1><center>Lista de las tiendas </center> </h1>

    <!-- Button trigger modal -->
    <a href="{{url('agregar-tienda')}}">
    <button type="button" class="btn btn-primary">
    Agregar nueva tienda 
    </button>
</a>
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
                            <a href="{{ url('editar-tienda/' . $tienda->id_tienda) }}">
                                <button type="button" class="btn btn-success">
                                    Editar
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$tienda->id_tienda}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
@endsection
@include('tienda.info')