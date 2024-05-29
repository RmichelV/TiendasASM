@extends('template')
@section('content')
<form action="" method="post">
    @csrf
    <div class="mb-3">

        <input
            type="hidden"
            class="form-control"
            name="fecha"
            id=""
            aria-describedby="helpId"
            value="{{now()}}"
        />
        
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Juego:</label>
        <select name="juego" id="" class="form-control">
            @foreach ($juegos as $juego)
                <option value="{{$juego->id_juego}}"> {{$juego->nombre}}</option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Selecione el juego</small>

        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input
                type="number"
                class="form-control"
                name="cantidad"
                id=""
                aria-describedby="helpId"
                placeholder="Escriba aquí por favor"
                required
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio Unitario</label>
            <input
                type="number"
                class="form-control"
                name="precio_u"
                id=""
                aria-describedby="helpId"
                placeholder="Escriba aquí por favor"
                required
                @foreach ($juegos as $juego)
                    value="{{$juego}}" 
                @endforeach
            />
            <!--revisar el de arriba-->
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio Total</label>
            <input
                type="number"
                class="form-control"
                name="precio_t"
                id=""
                aria-describedby="helpId"
                placeholder="Escriba aquí por favor"
                required
                @foreach ($juegos as $juego)
                    value="{{$juego}}" 
                @endforeach
            />
            <!--revisar el de arriba-->
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
        @php
            $user = Auth::User();
        @endphp
            <h1>{{$user->id}}</h1>
        <input
        type="hidden"
        class="form-control"
        name="user"
        id=""
        aria-describedby="helpId"
        value="{{$user->id}}"
        />
    </div>
    <button type="submit">Realizar Venta</button>
</form>
@endsection