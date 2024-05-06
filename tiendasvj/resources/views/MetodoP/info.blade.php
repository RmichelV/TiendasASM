<!-- Modal  Editar -->
@foreach ($metodos as $metodo)
<div class="modal fade" id="editar{{$metodo->id_metodop}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR MÉTODO DE PAGO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('metodos.update',$metodo->id_metodop) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Método de pago</label>
                        <input
                            type="text"
                            class="form-control crud @error('nombre') is-invalid @enderror"
                            name="nombre"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{$metodo->nombre}}"
                        />
                        <small id="helpId" class="form-text text-muted">Por favor no incluya caracteres como ser  "@./- ... etc"</small>
                        @error('nombre')
                            <div class="invalid-feedback">{{"Por favor introduzca un nombre valido"}}</div>
                        @enderror
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
@foreach ($metodos as $metodo)
<div class="modal fade" id="eliminar{{$metodo->id_metodop}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINAR MÉTODO DE PAGO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('metodos.destroy',$metodo->id_metodop)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar el método de pago: <strong>{{$metodo->nombre}}</strong>
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