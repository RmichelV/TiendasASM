<!-- resources/views/users/editar.blade.php -->
@extends('template')
@section('content')
    <h1 class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR USUARIO</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control crud @error('name') is-invalid @enderror"
                name="name"
                aria-describedby="helpId"
                placeholder="Escriba Aquí por favor"
                value="{{ $user->name }}"
            /> 
            <small id="helpId" class="form-text text-muted">Por favor no incluya caracteres como ser "@./- ... etc"</small>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <br>

            <label for="" class="form-label">Apellido</label>
            <input
                type="text"
                class="form-control crud @error('last_name') is-invalid @enderror"
                name="last_name"
                aria-describedby="helpId"
                placeholder="Escriba Aquí por favor"
                value="{{ $user->last_name }}"
            />
            <small id="helpId" class="form-text text-muted">Por favor no incluya caracteres como ser "@./- ... etc"</small>
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <br>

            <label for="" class="form-label">Fecha de Nacimiento</label>
            <input
                type="date"
                class="form-control crud @error('birthday') is-invalid @enderror"
                name="birthday"
                aria-describedby="helpId"
                value="{{ $user->birthday }}"
            />
            @error('birthday')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <br> 

            <label for="" class="form-label">Correo electrónico</label>
            <input
                type="text"
                class="form-control crud @error('email') is-invalid @enderror"
                name="email"
                aria-describedby="helpId"
                placeholder="Escriba Aquí por favor"
                value="{{ $user->email }}"
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <label for="" class="form-label">Contraseña</label>
            <input
                type="text"
                class="form-control crud"
                name="password"
                aria-describedby="helpId"
                placeholder="Escriba Aquí por favor"
                value="{{ $user->password }}"
                readonly
            />
            
            <label for="" class="form-label">Tipo de usuario</label>
            <select name="rol" class="form-control">
                @foreach ($rols as $rol)
                    <option value="{{ $rol->id_rol }}" {{ $rol->id_rol == $user->id_rol ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection
