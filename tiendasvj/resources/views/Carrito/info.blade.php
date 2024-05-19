<!-- Modal ELIMINAR-->
@foreach ($carritos as $carrito)
<div class="modal fade" id="eliminar{{$carrito->id_carrito}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINAR JUEGO DE TU CARRITO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('carritos.destroy',$carrito->id_carrito)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                        Estas seguro de eliminar el juego de tu carrito? </strong>
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