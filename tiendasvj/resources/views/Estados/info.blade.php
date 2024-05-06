<!-- Modal  Editar -->
@foreach ($estados as $estado)
<div class="modal fade" id="editar{{$estado->id_estado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ACTUALIZAR ESTADO DE VENTA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('estados.update',$estado->id_estado) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="" class="form-label">Estado de venta</label>
                        <input
                            type="text"
                            class="form-control crud @error('nombre') is-invalid @enderror"
                            name="nombre"
                            id=""
                            aria-describedby="helpId"
                            placeholder="Escriba Aquí por favor"
                            value="{{$estado->nombre }}"
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
@foreach ($estados as $estado)
<div class="modal fade" id="eliminar{{$estado->id_estado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINAR ESTADO DE VENTA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('estados.destroy',$estado->id_estado)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Estas seguro de eliminar el estado <strong>{{$estado->nombre}}</strong>
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