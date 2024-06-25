<!-- Modal Agregar -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">REALIZAR VENTA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('detalle_ventas.store') }}" method="post">
                    @csrf
                    <h2 style="color: red">Si la venta fue en efectivo realice directamente la venta</h2>
                    <h3>Precio Total: <span id="modal-precio-total"></span></h3>
                    <img src="{{ asset('/img/qrimg.jpeg') }}" alt="" height="400px" width="400px">
                    <input type="hidden" name="precio_t" id="modal-precio-t">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
