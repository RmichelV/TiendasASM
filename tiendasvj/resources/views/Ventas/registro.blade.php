@extends('template')
@section('content')
<form action="{{ route('detalle_ventas.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="juego-select" class="form-label">Juego:</label>
        <select name="juego" id="juego-select" class="form-control">
            @foreach ($juegos as $juego)
                <option value="{{$juego->id_juego}}" data-precio="{{$juego->precio}}">{{$juego->nombre}}</option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Seleccione el juego</small>
    </div>
    <div class="mb-3">
        <label for="precio_u" class="form-label">Precio Unitario</label>
        <input
            type="number"
            class="form-control"
            name="precio_u"
            id="precio_u"
            aria-describedby="helpId"
            placeholder="Escriba aquí por favor"
            required
            readonly
        />
    </div>
    
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input
            type="number"
            class="form-control"
            name="cantidad"
            id="cantidad"
            aria-describedby="helpId"
            placeholder="Escriba aquí por favor"
            required
        />
    </div>

    {{-- <button id="agregar-j">Agregar otro juego</button> --}}

    <div class="mb-3">
        <label for="precio_t" class="form-label">Precio Total</label>
        <input
            type="number"
            class="form-control"
            name="precio_t"
            id="precio_t"
            aria-describedby="helpId"
            placeholder="Escriba aquí por favor"
            required
            readonly
        />
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Metodo_de_pago</label>
        <select name="metodop" id="" class="form-control">
            @foreach ($metodosp as $metodop)
                @if ($metodop->id_metodop == 4 || $metodop->id_metodop==5)
                <option value="{{$metodop->id_metodop}}"> {{$metodop->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div>
        @php
            $user = Auth::User();
        @endphp
            
        <input
        type="hidden"
        class="form-control"
        name="user"
        id=""
        aria-describedby="helpId"
        value="{{$user->id}}"
        />
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">
        realizar venta
    </button>
</form>
@include('ventas.qr')
@endsection


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const selectJuego = document.getElementById('juego-select');
        const inputPrecio = document.getElementById('precio_u');
        const inputCantidad = document.getElementById('cantidad');
        const inputPrecioTotal = document.getElementById('precio_t');
    
        function updatePrecioTotal() {
            const cantidad = parseFloat(inputCantidad.value) || 0;
            const precioUnitario = parseFloat(inputPrecio.value) || 0;
            inputPrecioTotal.value = cantidad * precioUnitario;
        }
    
        selectJuego.addEventListener('change', function() {
            const selectedOption = selectJuego.options[selectJuego.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            inputPrecio.value = precio;
            updatePrecioTotal();
        });
    
        inputCantidad.addEventListener('input', updatePrecioTotal);
    
        // Inicializar el valor del precio y del precio total cuando la página carga
        if (selectJuego.options.length > 0) {
            const selectedOption = selectJuego.options[selectJuego.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            inputPrecio.value = precio;
            updatePrecioTotal();
        }
    });
    </script>