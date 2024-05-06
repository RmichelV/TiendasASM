<!-- Modal  Editar -->
@foreach ($users as $user)
<div class="modal fade" id="editar{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update',$user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input
                            type="text"
                            class="form-control crud @error('name') is-invalid @enderror"
                            name="name"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{$user->name}}"
                        /> 
                        <small id="helpId" class="form-text text-muted">Por favor no incluya caracteres como ser  "@./- ... etc"</small>
                        @error('name')
                            <div class="invalid-feedback">{{"Por favor introduzca un nombre valido"}}</div>
                        @enderror
                        
                        <br>

                        <label for="" class="form-label">Apellido</label>
                        <input
                            type="text"
                            class="form-control crud @error('last_name') is-invalid @enderror"
                            name="last_name"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{ $user->last_name }}"
                        />
                        <small id="helpId" class="form-text text-muted">Por favor no incluya caracteres como ser  "@./- ... etc"</small>
                        @error('last_name')
                            <div class="invalid-feedback">{{"Por favor introduzca un apellido valido"}}</div>
                        @enderror

                        <br>

                        <label for="" class="form-label">Fecha de Nacimiento</label>
                        <input
                            type="date"
                            class="form-control crud @error('birthday') is-invalid @enderror"
                            name="birthday"
                            id=""
                            aria-describedby="helpId"
                            value="{{ $user->birthday}}"
                        />
                        @error('birthday')
                        <div class="invalid-feedback">{{"Por favor introduzca una fecha valida"}}</div>
                        @enderror

                        <br> 

                        <label for="" class="form-label">Correo electronico</label>
                        <input
                            type="text"
                            class="form-control crud @error('email') is-invalid @enderror"
                            name="email"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{ $user->email }}"
                        />
                        @error('email')
                            <div class="invalid-feedback">{{"Por favor introduzca un correo electronico"}}</div>
                        @enderror
                        

                        <label for="" class="form-label">Contraseña</label>
                        <input
                            type="text"
                            class="form-control crud"
                            name="password"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{ $user->password}}"
                        />
                        
                        <label for="" class="form-label">Tipo de usuario</label>
                        <select name="rol" id="" class="form-control">
                            @foreach ($rols as $rol)
                            @if($rol->id_rol==$user->id_rol)
                            <option value="{{$rol->id_rol}}" selected> {{$rol->nombre}}</option>
                            @else
                            <option value="{{$rol->id_rol}}"> {{$rol->nombre}}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endforeach

<!-- Modal ELIMINAR-->
@foreach ($users as $user)
<div class="modal fade" id="eliminar{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINAR USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('users.destroy',$user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar al usuario: <strong>{{$user->name}}</strong>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
