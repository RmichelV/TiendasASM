<!-- Modal editar -->
@foreach ($tiendas as $tienda)
<div class="modal fade" id="editar{{$tienda->id_tienda}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tienda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('tiendas.update',$tienda->id_tienda)}}" method="post">
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
                            class="form-control crud @error('nombre') is-invalid @enderror"
                            name="direccion"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Ej. Av. Uyustus puesto #10"
                            value="{{$tienda->direccion}}"
                            required
                        />
                        @error('nombre')
                            <div class="invalid-feedback">{{"Por favor una dirección"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Propietario: </label>
                        <select name="user" id="" class="form-control">
                            @foreach ($users as $user)
                                @if($tienda->user_id==$user->id)
                                    <option value="{{$user->id}}" selected> {{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}"> {{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    
@endforeach
@foreach ($tiendas as $tienda)
    

<!-- Modal ELIMINAR-->
<div class="modal fade" id="eliminar{{$tienda->id_tienda}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Tienda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('tiendas.destroy',$tienda->id_tienda)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar la tienda  <strong>{{$tienda->nombre}}</strong>
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