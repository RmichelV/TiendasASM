@extends('template')
@section('content')
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
        Agregar método de pago
    </button>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Método de pago</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metodos as $metodo)
                    <tr class="">
                        <td scope="row">{{$metodo->id_metodop}} </td>
                        <td>{{$metodo->nombre}} </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar{{$metodo->id_metodop}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$metodo->id_metodop}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('metodop.agregar')
    @include('metodop.info')
    
@endsection