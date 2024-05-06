@extends('template')
@section('content')
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
        Agregar nueva plataforma 
    </button>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Plataforma</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plataformas as $plataforma)
                    <tr class="">
                        <td scope="row">{{$plataforma->id_plataforma}} </td>
                        <td>{{$plataforma->nombre}} </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar{{$plataforma->id_plataforma}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$plataforma->id_plataforma}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('plataformas.agregar')
    @include('plataformas.info')
    
@endsection