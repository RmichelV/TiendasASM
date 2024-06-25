<!-- resources/views/users/index.blade.php -->
@extends('template')
@section('content')

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Correo</th>
                    {{-- <th scope="col">Contraseña</th> --}}
                    <th scope="col">Tipo de Usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <td scope="row">{{$user->id}} </td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->last_name}} </td>
                        <td>{{$user->birthday}} </td>
                        <td>{{$user->email}} </td>
                        {{-- <td>{{$user->password}} </td> --}}
                        <td>{{$user->rol->nombre}} </td>
                        <td>
                            <a href="{{ url('editar-u/' . $user->id) }}">
                                <button type="button" class="btn btn-success">
                                    Editar
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$user->id}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('users.info')
    
@endsection
