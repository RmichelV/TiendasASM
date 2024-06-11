{{-- 
@extends('template')
@section('content')

<center><h1>Lista de tus juegos por comprar</h1></center>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Juego</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $userId=Auth::User();
                    $ini = 1;
                    $totalPrecio = 0; // Variable para almacenar el total de precios
                @endphp
                @foreach ($carritos as $carrito)
                    @if ($userId->id==$carrito->user_id)
                    <tr class="">
                        <td scope="row">{{$ini++}}</td>
                        @foreach($carrito->juego as $juego)
                            <td> {{$juego->nombre}}</td>
                            <td>{{$juego->precio}}</td>
                            @php
                                $totalPrecio += $juego->precio; // Sumar el precio al total
                            @endphp
                        @endforeach
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$carrito->id_carrito}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Campo de texto para mostrar el total -->
    <div class="mb-3">
        <label for="totalPrecio" class="form-label">Total Precio:</label>
        <input type="text" class="form-control" id="totalPrecio" name="total_precio" value="{{$totalPrecio}}" readonly>
    </div>
    
    <a href="{{url('mpago')}}"><button type="button" class="btn btn-success">Comprar</button></a>
    @include('carrito.info')

    <!-- JavaScript para actualizar el total cuando cambien los precios -->
    <script>
        // Función para calcular y actualizar el total del precio
        function actualizarTotal() {
            var total = 0;
            // Sumar los precios de cada juego
            $('.table tbody tr').each(function() {
                var precio = parseFloat($(this).find('td:eq(2)').text());
                total += precio;
            });
            // Actualizar el valor del campo de texto
            $('#totalPrecio').val(total.toFixed(2));
        }

        // Llamar a la función al cargar la página y cuando cambien los precios
        $(document).ready(function() {
            actualizarTotal();
            $('.table tbody').on('DOMSubtreeModified', actualizarTotal);
        });
    </script>
@endsection --}}

@extends('template')
@section('content')

<center><h1>Lista de tus juegos por comprar</h1></center>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Juego</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $userId=Auth::User();
                $ini = 1;
                $totalPrecio = 0; // Variable para almacenar el total de precios
            @endphp
            @foreach ($carritos as $carrito)
                @if ($userId->id==$carrito->user_id)
                <tr class="">
                    <td scope="row">{{$ini++}}</td>
                    @foreach($carrito->juego as $juego)
                        <td> {{$juego->nombre}}</td>
                        <td>{{$juego->precio}}</td>
                        @php
                            $totalPrecio += $juego->precio; // Sumar el precio al total
                        @endphp
                    @endforeach
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$carrito->id_carrito}}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<!-- Campo de texto para mostrar el total -->
<div class="mb-3">
    <label for="totalPrecio" class="form-label">Total Precio:</label>
    <input type="text" class="form-control" id="totalPrecio" value="{{$totalPrecio}}" readonly>
</div>

<!-- Botón "Comprar" que abre el modal con el precio total -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPrecioTotal">
    Comprar
</button>

@include('carrito.info')

<!-- Modal que muestra el precio total -->
<div class="modal fade" id="modalPrecioTotal" tabindex="-1" aria-labelledby="modalPrecioTotalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPrecioTotalLabel">Precio Total</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El precio total de tu compra es: <span id="precioTotal">{{$totalPrecio}}</span></p>
                <img src="{{asset('img/qrimg.jpeg')}}" alt="" class="qrimg">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- Aquí puedes agregar un botón para confirmar la compra si lo deseas -->
            </div>
        </div>
    </div>
</div>

@endsection
