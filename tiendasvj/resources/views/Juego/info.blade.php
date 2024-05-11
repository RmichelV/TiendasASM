<!-- Modal editar -->
@foreach ($juegos as $juego)
    

<div class="modal fade" id="editar{{$juego->id_juego}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Juego</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('juegos.update',$juego->id_juego)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del juego </label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue el rol aqui"
                            value="{{$juego->nombre}}"
                        />
                        <label for="" class="form-label">Descripcion</label>
                        <input
                            type="text"
                            class="form-control"
                            name="descripcion"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue el rol aqui"
                            value="{{$juego->descripcion}}"
                        />
                        <label for="" class="form-label">Cantidad de jugadores</label>
                        <input
                            type="text"
                            class="form-control"
                            name="cantidad"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue la cantidad de jugadores aqui"
                            value="{{$juego->cantidad_de_jugadores}}"
                        />
                        <label for="" class="form-label">Precio</label>
                        <input
                            type="text"
                            class="form-control"
                            name="precio"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue el precio del juego aqui"
                            value="{{$juego->precio}}"
                        />
                        <label for="" class="form-label">Cantidad en Stock </label>
                        <input
                            type="text"
                            class="form-control"
                            name="stock"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue la cantidad de su stock juego aqui"
                            value="{{$juego->stock}}"
                        />
                        <label for="" class="form-label">Imagen</label>
                        <input
                            type="text"
                            class="form-control"
                            name="imagen"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Agregue la url de la imagen (link) de su juego aqui"
                            value="{{$juego->imagen}}"
                        />
                        {{-- <label for="user" class="form-label">Pertenece a: </label>
                        <select name="user" id="" class="form-control">
                            @foreach ($users as $user)
                            @if($tienda->user_id==$user->id)
                            <option value="{{$user->id}}" selected> {{$user->name}}</option>
                            @else
                            <option value="{{$user->id}}"> {{$user->name}}</option>
                            @endif
                            @endforeach
                        </select> --}}
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
@foreach ($juegos as $juego)
    

<!-- Modal ELIMINAR-->
<div class="modal fade" id="eliminar{{$juego->id_juego}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Juego</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('juegos.destroy',$juego->id_juego)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar el juego  <strong>{{$juego->nombre}}</strong>
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