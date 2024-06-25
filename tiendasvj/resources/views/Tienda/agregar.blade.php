@extends('template')
@section('content')
@php
    $user=Auth::User()
@endphp
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nueva tienda</h1>
            <form action="{{route('tiendas.store')}}" method="post" onsubmit="return validarFormulario()">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre de la tienda: </label>
                        <input
                            type="text"
                            class="form-control crud @error('nombre') is-invalid @enderror"
                            name="nombre"
                            id="nombre"
                            aria-describedby="helpId"
                            placeholder="Escriba aquí por favor"
                            required
                        />
                        @error('nombre')
                            <div class="invalid-feedback">{{"Por favor introduzca un nombre"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Direccion de la tienda: </label>
                        <input
                            type="text"
                            class="form-control crud @error('direccion') is-invalid @enderror"
                            name="direccion"
                            id="direccion"
                            aria-describedby="helpId"
                            placeholder="Ej. Av. Uyustus puesto #10""
                            required
                        />
                        <small id="helpId" class="form-text text-muted">de ser puesto incluya el numero con # </small>
                        @error('direccion')
                            <div class="invalid-feedback">{{"Por favor introduzca una direccion"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Propietario: </label>
                        <select name="user" id="" class="form-control">
                            @foreach ($users as $user)
                            @if ($user->id_rol==2)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
@endsection