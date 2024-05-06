@extends('template')
@section('content')
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
        Agregar nuevo rol
    </button>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rols as $rol)
                    <tr class="">
                        <td scope="row">{{$rol->id_rol}} </td>
                        <td>{{$rol->nombre}} </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar{{$rol->id_rol}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$rol->id_rol}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('rols.agregar')
    @include('rols.info')
    
@endsection