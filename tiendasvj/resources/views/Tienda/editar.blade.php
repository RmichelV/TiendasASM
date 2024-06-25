@extends('template')
@section('content')
@php
    $user=Auth::User(); 
@endphp
    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tienda</h1>
    <form action="{{route('tiendas.update', $tienda->id_tienda)}}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="" class="form-label">Nombre de la Tienda</label>
                <input
                    type="text"
                    class="form-control crud @error('nombre') is-invalid @enderror"
                    name="nombre"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Escriba aquí por favor"
                    value="{{$tienda->nombre}}"
                    required
                />
                @error('nombre')
                    <div class="invalid-feedback">{{"Por favor introduzca un nombre"}}</div>
                @enderror
                <br>
                <label for="" class="form-label">Direccion de la  Tienda</label>
                <input
                    type="text"
                    class="form-control crud @error('direccion') is-invalid @enderror"
                    name="direccion"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ej. Av. Uyustus puesto #10"
                    value="{{$tienda->direccion}}"
                    required
                />
                @error('direccion')
                    <div class="invalid-feedback">{{"Por favor introduzca una dirección"}}</div>
                @enderror
                <br>
                <label for="" class="form-label">Propietario: </label>
                <select name="user" id="" class="form-control">
                    @foreach ($users as $user)
                    @if ($user->id_rol == 2) <!-- Condición para mostrar solo usuarios con id_rol igual a 2 -->
                        @if ($tienda->user_id == $user->id)
                            <option value="{{ $user->id }}" selected> {{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                        @endif
                    @endif
                @endforeach
                </select>
            </div>
            <div class="modal-footer">
                {{-- <a href="{{url('tiendas')}}"> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            {{-- </a> --}}
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
@endsection
