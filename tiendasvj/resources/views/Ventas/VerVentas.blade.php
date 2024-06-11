@extends('template')
@section('content')
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha de compra</th>
                    <th scope="col">Precio Total </th>
                    <th scope="col">Metodo de Pago</th>
                    <th scope="col">Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    
                <tr class="">
                    <td scope="row">{{$venta->id_venta}}</td>
                    <td>{{$venta->user->name}}</td>
                    <td>{{$venta->precio_total}}</td>
                    <td>{{$venta->metodo_de_pago->nombre}}</td>
                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detalle{{$venta->id_venta}}">
                        Detalle de venta
                    </button></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
@endsection
@include('ventas.detalle')