@foreach ($ventas as $venta)
    <div class="modal fade" id="detalle{{$venta->id_venta}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle de Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Juego</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalle_de_ventas as $detalle)
                                    <tr>
                                        <td>{{ $detalle->id_juego }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ $detalle->precio_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
