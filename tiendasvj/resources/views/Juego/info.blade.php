<!-- Modal editar -->
@foreach ($juegos as $juego)
    

<div class="modal fade" id="editar{{$juego->id_juego}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Juego</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('juegos.update',$juego->id_juego)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del juego </label>
                        <input
                            type="text"
                            class="form-control crud @error('nombre') is-invalid @enderror"
                            name="nombre"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba aquí por favor"
                            required
                            value="{{$juego->nombre}}"
                        />
                        @error('nombre')
                            <div class="invalid-feedback">{{"Por favor introduzca un nombre"}}</div>
                        @enderror

                        <br> 

                        <label for="" class="form-label">Descripcion del juego</label>
                        <input
                            name="descripcion"
                            class="form-control crud @error('descripcion') is-invalid @enderror"
                            rows="4" 
                            cols="50"
                            placeholder="Escriba aquí por favor"
                            required
                            value="{{$juego->descripcion}}"
                        />
                        @error('descripcion')
                            <div class="invalid-feedback">{{"Por favor introduzca una descripcion valida"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Cantidad de jugadores</label>
                        <select name="cantidad" id="">
                            <option value="1 jugador">1 jugador</option>
                            <option value="1 a 2 jugadores">1 a 2 jugadores</option>
                            <option value="1 a 4 jugadores">1 a 4 jugadores</option>
                            <option value="1 a 4 jugadores">1 a 8 jugadores</option>
                            <option value="1 a 4 jugadores">1 a 16 jugadores</option>
                            <option value="2 jugadores">2 jugadores</option>
                            <option value="Multijugador">Multijugador</option>
                        </select>
                        <br>
                        <label for="" class="form-label">Precio</label>
                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            class="form-control crud @error('precio') is-invalid @enderror"
                            name="precio"
                            id="precio"
                            aria-describedby="helpId"
                            placeholder="Ej. 0.10"
                            required
                            value="{{$juego->precio}}"
                        />
                        @error('precio')
                            <div class="invalid-feedback">{{"Por favor introduzca un monto valida"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Cantidad en Stock </label>
                        <input
                            type="number"
                            class="form-control crud @error('stock') is-invalid @enderror"
                            name="stock"
                            id="stock"
                            aria-describedby="helpId"
                            placeholder="Agregue la cantidad de stock que posee del juego aqui"
                            required
                            value="{{$juego->stock}}"
                        />
                        @error('stock')
                            <div class="invalid-feedback">{{"Por favor introduzca una cantidad valida"}}</div>
                        @enderror
                        <br>
                        <label for="" class="form-label">Imagen del juego</label>
                        <input
                            type="file"
                            class="form-control"
                            name="imagen"
                            id=""
                            aria-describedby="helpId"
                            accept="image/*"
                        
                            required
                        />
                        @error('imagen')
                            <div class="invalid-feedback">{{"Por favor introduzca imagen valida"}}</div>
                        @enderror
                    <br>
                    <label for="" class="form-label">Seleccione los géneros </label>
                    <div class="generos-container">
                        @foreach ($generos as $genero)
                            <div class="genero">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="generos[]" id="generos" value="{{$genero->id_genero}}">
                                    <label class="form-check-label" for="">{{$genero->nombre}}</label>
                                </div>
                            </div>
                        @endforeach
                        @error('generos')
                            <div class="invalid-feedback">{{ "Debe seleccionar al menos una genero" }}</div>
                        @enderror
                    </div>
                    <br>
                    <label for="" class="form-label">Seleccione las plataformas </label>
                    <div class="plataformas-container">
                        @foreach ($plataformas as $plataforma)
                        <div class="plataforma">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="plataformas[]" id="plataformas" value="{{$plataforma->id_plataforma}}">
                                <label class="form-check-label" for="">{{$plataforma->nombre}}</label>
                            </div>
                        </div>
                        @endforeach
                        @error('plataformas')
                            <div class="invalid-feedback">{{ "Debe seleccionar al menos una plataforma" }}</div>
                        @enderror
                    </div>
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